<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect('/dashboard', navigate: true);
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
        <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-3 text-xl font-bold leading-[1.2]">
            <span class="flex h-[33px] w-[33px] items-center justify-center rounded-[10px] bg-scholarhub-primary p-[6.667px] text-white">
                <x-lucide-school class="h-5 w-5" />
            </span>
            ScholarHub
        </a>

        <div class="flex flex-col gap-2">
            <h1 class="text-[25px] font-bold leading-[1.2]">
                Create an account
            </h1>
            <p class="text-base font-medium leading-[1.2]">
                Enter your details below to create your account.
            </p>
        </div>
    </div>

    <x-auth-session-status class="text-base font-medium text-scholarhub-success" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <div class="flex flex-col gap-4">
            <div>
                <input
                    wire:model="name"
                    id="name"
                    type="text"
                    name="name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Your full name"
                    class="h-14 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-muted focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('name')
                    <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input
                    wire:model="email"
                    id="email"
                    type="email"
                    name="email"
                    required
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
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Your password"
                        class="h-14 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 pr-12 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-muted focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                    >
                    <x-lucide-eye-off class="pointer-events-none absolute right-4 top-1/2 h-6 w-6 -translate-y-1/2" />
                </div>
                @error('password')
                    <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="relative">
                    <input
                        wire:model="password_confirmation"
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm password"
                        class="h-14 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 pr-12 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-muted focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                    >
                    <x-lucide-eye-off class="pointer-events-none absolute right-4 top-1/2 h-6 w-6 -translate-y-1/2" />
                </div>
                @error('password_confirmation')
                    <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <button
                type="submit"
                class="flex h-12 w-full items-center justify-center rounded-lg bg-scholarhub-primary px-4 text-base font-semibold leading-[1.2] text-scholarhub-background"
            >
                Sign Up
            </button>

            <p class="text-base font-medium leading-[1.2]">
                Already have an account?
                <a href="{{ route('login') }}" wire:navigate class="font-semibold underline">
                    Log In
                </a>
            </p>
        </div>
    </form>
</div>
