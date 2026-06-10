<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
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
                Forgot password
            </h1>
            <p class="text-base font-medium leading-[1.2]">
                Enter your email to receive a password reset link.
            </p>
        </div>
    </div>

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <div class="flex flex-col gap-4">
            <div>
                <input
                    wire:model="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    placeholder="Your email"
                    class="h-14 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-muted focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('email')
                    <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @if(session('status'))
                <p class="text-base font-medium leading-[1.2] text-[#004a32]">
                    {{ session('status') }}
                </p>
            @endif
        </div>

        <div class="flex flex-col gap-6">
            <button
                type="submit"
                class="flex h-12 w-full items-center justify-center rounded-lg bg-scholarhub-primary px-4 text-base font-semibold leading-[1.2] text-scholarhub-background"
            >
                Send Reset Link
            </button>

            <p class="text-base font-medium leading-[1.2]">
                Or, return to
                <a href="{{ route('login') }}" wire:navigate class="font-semibold underline">
                    Log In
                </a>
            </p>
        </div>
    </form>
</div>
