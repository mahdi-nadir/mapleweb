<x-guest-layout>
    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="title">Inscription</div>
        
        <!-- Username -->
        <div class="input-container">
            <x-input-label class="labelForm" for="username" :value="__('Nom d\'utilisateur')" />
            <x-text-input id="username" class="input block mt-1 w-full" type="text" name="username" placeholder="Ex: MedyZeus" :value="old('username')" required autofocus autocomplete="username" />
            <span class="usernameErr error"></span>
            <x-input-error :messages="$errors->get('username')" class="error" />
        </div>

        <!-- Email Address -->
        <div class="input-container ic1 mt-4">
            <x-input-label class="labelForm" for="email" :value="__('Courriel')" />
            <x-text-input id="email" class="input block mt-1 w-full" type="email" name="email" placeholder="Ex: XYZ@gmail.com" :value="old('email')" required autocomplete="username" />
            <span class="emailErr error"></span>
            
        </div>

        <!-- Password -->
        <div id="divPassword" class="input-container ic1">
            <x-input-label class="labelForm" for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="input block mt-1 w-full" 
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            
            <span class="passwordErr error"></span>

            <x-input-error :messages="$errors->get('password')" class="error" />
        </div>

        <!-- Confirm Password -->
        <div class="input-container ic1 mt-4">
            <x-input-label class="labelForm" for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="input block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <span class="password_confirmationErr error"></span>

            <x-input-error :messages="$errors->get('password_confirmation')" class="error" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button id="registerBtn" class="labelForm submit ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    {{-- <div class="overlay" style="display: none;"></div> --}}

    <div class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-body">
                <x-input-error id="errorMail" :messages="$errors->get('email')" class="error modalish" />
            </div>
        </div>
    </div>
</x-guest-layout>


<script>
    let form = document.querySelector('.form');
    let username = document.getElementById('username');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let password_confirmation = document.getElementById('password_confirmation');
    let submit = document.querySelector('#registerBtn');
    let usernameErr = document.querySelector('.usernameErr');
    let emailErr = document.querySelector('.emailErr');
    let passwordErr = document.querySelector('.passwordErr');
    let password_confirmationErr = document.querySelector('.password_confirmationErr');
    let divPassword = document.querySelector('#divPassword');
    let errorMail = document.querySelector('#errorMail');
    let modal = document.querySelector('.modal');

    if (errorMail != null) {
        modal.style.display = "block";
        setTimeout(() => {
            modal.style.display = "none";
        }, 4000);
    }


    username.addEventListener('keyup', function() {
        const regex = /^[A-Za-z]+[\d]*[A-Za-z]*$/;
        
        if(!regex.test(username.value) && username.value.length >= 5) {
            usernameErr.innerHTML = "Veuillez entrer un nom d'utilisateur valide";
            submit.disabled = true;
        } else if (username.value == "") {
            usernameErr.innerHTML = "Veuillez entrer un nom d'utilisateur";
            submit.disabled = true;
        } else if (!regex.test(username.value) || username.value.length < 5) {
            usernameErr.innerHTML = "Le nom d'utilisateur doit contenir au moins 5 caractères alphanumériques";
            submit.disabled = true;
        } else {
            usernameErr.innerHTML = "";
            submit.disabled = false;
        }
    });

    email.addEventListener('keyup', function() {
        const regex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        
        if(!regex.test(email.value)) {
            emailErr.innerHTML = "Veuillez entrer un courriel valide";
            submit.disabled = true;
        } else if (email.value == "") {
            emailErr.innerHTML = "Veuillez entrer un courriel";
            submit.disabled = true;
        } else {
            emailErr.innerHTML = "";
            submit.disabled = false;
        }
    });

    password.addEventListener('keyup', function() {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/;
        
        if(!regex.test(password.value) && password.value.length >= 8) {
            passwordErr.innerHTML = "Veuillez entrer un mot de passe valide";
            submit.disabled = true;
            divPassword.style.marginBottom = "4rem";
        } else if (password.value == "") {
            passwordErr.innerHTML = "Veuillez entrer un mot de passe";
            submit.disabled = true;
            divPassword.style.marginBottom = "4rem";
        } else if (!regex.test(password.value) || password.value.length < 8) {
            passwordErr.innerHTML = "Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial";
            divPassword.style.marginBottom = "7rem";
            submit.disabled = true;
        } else {
            passwordErr.innerHTML = "";
            submit.disabled = false;
            divPassword.style.marginBottom = "4rem";
        }
    });

    password_confirmation.addEventListener('keyup', function() {
        if(password_confirmation.value != password.value) {
            password_confirmationErr.innerHTML = "Les mots de passe ne correspondent pas";
            submit.disabled = true;
        } else if (password_confirmation.value == "") {
            password_confirmationErr.innerHTML = "Veuillez confirmer votre mot de passe";
            submit.disabled = true;
        } else {
            password_confirmationErr.innerHTML = "";
            submit.disabled = false;
        }
    });

    submit.addEventListener('click', function(e) {
        e.preventDefault();

        // let username = document.getElementById('username');
        // let email = document.getElementById('email');
        // let password = document.getElementById('password');
        // let password_confirmation = document.getElementById('password_confirmation');
        // let usernameErr = document.querySelector('.usernameErr');
        // let emailErr = document.querySelector('.emailErr');
        // let passwordErr = document.querySelector('.passwordErr');
        // let password_confirmationErr = document.querySelector('.password_confirmationErr');
        // let divPassword = document.querySelector('#divPassword');
        // let errorMail = document.querySelector('#errorMail');
        // let modal = document.querySelector('.modal');

        if (username.value == "") {
            usernameErr.innerHTML = "Veuillez entrer un nom d'utilisateur";
            submit.disabled = true;
        }  if (email.value == "") {
            emailErr.innerHTML = "Veuillez entrer un courriel";
            submit.disabled = true;
        }  if (password.value == "") {
            passwordErr.innerHTML = "Veuillez entrer un mot de passe";
            submit.disabled = true;
            divPassword.style.marginBottom = "4rem";
        }  if (password_confirmation.value == "") {
            password_confirmationErr.innerHTML = "Veuillez confirmer votre mot de passe";
            submit.disabled = true;
        } else {
            submit.disabled = false;
            form.submit();
        }
    });
</script>
