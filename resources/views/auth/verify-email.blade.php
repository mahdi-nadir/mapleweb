<x-guest-layout>
    

    <div class="mt-4 flex items-center justify-between">
        <form class="form" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="remark mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre courriel en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.") }}
            </div>
        
            @if (session('status') == 'verification-link-sent')
                <div class="remark mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __("Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de votre inscription.") }}
                </div>
            @endif

            <div>
                <x-primary-button class="submit ic1">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="submit underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
