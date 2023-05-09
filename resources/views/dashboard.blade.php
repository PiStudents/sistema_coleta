<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @can('ponto_coleta')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        @endcan

        @can('admin')
        <section class="text-black-400 bg-white-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap">

                    <div class="p-4 lg:w-1/3">
                        <div class="h-full bg-lime-500 px-8 pt-24 pb-24 rounded-lg overflow-hidden text-center relative">
                            <h1 class="title-font sm:text-2xl text-xl font-black text-white mb-3">Suporte</h1>
                            <p class="leading-relaxed mb-3">Nós nos esforçamos para oferecer um serviço de alta qualidade e estamos à disposição para ajudá-lo(a) sempre que precisar. Não hesite em entrar em contato conosco se tiver alguma dúvida ou precisar de suporte. </p>
                        </div>
                    </div>

                    <div class="p-4 lg:w-1/3">
                        <div class="h-full bg-lime-500 px-8 pt-24 pb-24 rounded-lg overflow-hidden text-center relative">
                            <h1 class="title-font sm:text-2xl text-xl font-black text-white mb-3">Exibição no Mapa</h1>
                            <p class="leading-relaxed mb-3">Suas informações podem levar alguns dias para serem aprovadas e exibidas em nossos mapas!</p>
                        </div>
                    </div>

                    <div class="p-4 lg:w-1/3">
                        <div class="h-full bg-lime-500 px-8 pt-24 pb-24 rounded-lg overflow-hidden text-center relative">
                            <h1 class="title-font sm:text-2xl text-xl font-black text-white mb-3">Agradecimentos</h1>
                            <p class="leading-relaxed mb-3">Mais uma vez, obrigado por confiar em nós..
                                Vamos juntos fazer do mundo um lugar melhor!
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endcan
    </div>

</x-app-layout>