<x-guest-layout>

    <script>
        alert("Prezado usuário, para o lançamento oficial de nossa plataforma \n estamos aceitando apenas registro de Pontos de coleta. \n Agradecemos a compreensão!")
    </script>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex items-center	justify-center">
            <img src="{{ asset('img/green-recycler.png') }}" alt="Logo" style="width:8rem">
        </div>

        <!-- Nome -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Endereço -->
        <div class="mt-4">
            <x-input-label for="endereco" :value="__('Endereço')" />
            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" placeholder="R. Polidoro Simões, 533, Paraguaçu Paulista - SP" required autocomplete="endereco" />
            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="tel" name="telefone" :value="old('telefone')" maxlength="15" onkeyup="handlePhone(event)" required autocomplete="telefone" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Tipo de Usuário 
        <div class="mt-4">
            <x-input-label for="user_type" :value="__('Tipo de Usuário')" />
            <select id="user_type" class="block mt-1 w-full" name="user_type" required>
                <option value="">Selecione...</option>
                <option value="ponto_coleta">Ponto de coleta</option>
                <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
            </select>
        </div> -->

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
    </script>
</x-guest-layout>