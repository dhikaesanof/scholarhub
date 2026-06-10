<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();


        if (auth()->user()->role === 'ADMIN') {

            $this->redirect('/admin/dashboard', navigate: true);

            return;
        }

        if (auth()->user()->role === 'MENTOR') {

            $this->redirect('/mentor/dashboard', navigate: true);

            return;
        }

        $this->redirect('/dashboard', navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div
    class="
        flex
        w-full
        max-w-[684px]
        flex-col
        gap-14
        overflow-hidden
        rounded-lg
        border
        border-scholarhub-border
        bg-white
        p-8
        text-scholarhub-primary
    "
>
    <div class="flex flex-col gap-6">
        <a
            href="{{ route('home') }}"
            wire:navigate
            class="
                flex
                items-center
                gap-3
                text-xl
                font-bold
                leading-[1.2]
            "
        >
            <span
                class="
                    flex
                    h-[33px]
                    w-[33px]
                    items-center
                    justify-center
                    rounded-[10px]
                    bg-scholarhub-primary
                    p-[6.667px]
                    text-white
                "
            >
                <x-lucide-school class="h-5 w-5" />
            </span>
            ScholarHub
        </a>

        <div class="flex flex-col gap-2">
            <h1 class="text-[25px] font-bold leading-[1.2]">
                Log in to your account
            </h1>
            <p class="text-base font-medium leading-[1.2]">
                Enter your email and password below to log in.
            </p>
        </div>
    </div>

    <x-auth-session-status class="text-base font-medium text-scholarhub-success" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <div class="flex flex-col gap-4">
            <div>
                <input
                    wire:model="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="Your email"
                    class="h-14 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-muted focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('email')
                    <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="relative">
                    <input
                        wire:model="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Your password"
                        class="h-14 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 pr-12 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-muted focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                    >
                    <x-lucide-eye-off class="pointer-events-none absolute right-4 top-1/2 h-6 w-6 -translate-y-1/2" />
                </div>
                @error('password')
                    <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    wire:navigate
                    class="self-end text-base font-medium leading-[1.2] text-scholarhub-muted underline"
                >
                    Forgot Password?
                </a>
            @endif
        </div>

        <div class="flex flex-col gap-6">
            <label class="flex items-center gap-2 text-base font-medium leading-[1.2]">
                <input
                    wire:model="remember"
                    type="checkbox"
                    class="h-6 w-6 rounded border-scholarhub-primary text-scholarhub-primary"
                >
                Remember me
            </label>

            <button
                type="submit"
                class="flex h-12 w-full items-center justify-center rounded-lg bg-scholarhub-primary px-4 text-base font-semibold leading-[1.2] text-scholarhub-background"
            >
                Login
            </button>

            <p class="text-base font-medium leading-[1.2]">
                Don't have an account?
                <a href="{{ route('register') }}" wire:navigate class="font-semibold underline">
                    Sign Up
                </a>
            </p>
        </div>
    </form>
</div>
