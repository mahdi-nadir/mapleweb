<x-guest-layout>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="remark mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Vous avez oublié votre mot de passe ? Pas de problème. Indiquez simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe par e-mail, qui vous permettra d'en choisir un nouveau.") }}
        </div>

        <!-- Email Address -->
        <div class="input-container">
            <x-input-label class="labelForm" for="email" :value="__('Email')" />
            <x-text-input id="email" class="input block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error class="error" :messages="$errors->get('email')" />
        </div>

        <div class="ic1 flex items-center justify-end mt-4">
            <x-primary-button class="submit">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
