<x-guest-layout>
    <form class="form" method="POST" action="{{ route('password.store') }}">
        @csrf

        <div class="title">Nouveau mot de passe</div>
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="input-container">
            <x-input-label class="labelForm" for="email" :value="__('Email')" />
            <x-text-input id="email" class="input block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error class="error" :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="input-container ic1 mt-4">
            <x-input-label class="labelForm" for="password" :value="__('Password')" />
            <x-text-input id="password" class="input block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error class="error" :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="input-container ic1 mt-4">
            <x-input-label class="labelForm" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="input block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error class="error" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="ic1 flex items-center justify-end mt-4">
            <x-primary-button class="submit">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
