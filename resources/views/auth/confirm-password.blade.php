<x-guest-layout>
    
    <form class="form" method="POST" action="{{ route('password.confirm') }}">
        @csrf
        
        <div class="remark mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Ceci est une zone sécurisée de l'application. Veuillez confirmer votre mot de passe avant de continuer.") }}
        </div>
        
        <!-- Password -->
        <div class="input-container">
            <x-input-label class="labelForm" for="password" :value="__('Password')" />

            <x-text-input id="password" class="input block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="error" />
        </div>

        <div class="ic1 flex justify-end mt-4">
            <x-primary-button class="submit">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
