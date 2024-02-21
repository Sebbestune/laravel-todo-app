<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Välkommen till TODO sidan. Starta din lista genom att logga in eller registrera!

                    <br>

                    <x-primary-button class="ms-3">
                        <a href="{{ route('login') }}">Logga in</a>
                    </x-primary-button>
                    <x-primary-button class="ms-3">
                        <a href="{{ route('register') }}">Registrera</a>
                    </x-primary-button>


                </div>
            </div>
        </div>
    </div>
</x-guest-layout>