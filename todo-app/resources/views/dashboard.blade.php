<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900">
                    <x-primary-button class="ms-3">
                        <a href="{{ route('todo.create') }}">Skapa ny</a>
                    </x-primary-button>
                </div>
            </div>

            @foreach (Auth::user()->todos as $todo)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900">

                    <h2 class="font-semibold text-l text-gray-800 leading-tight">{{ $todo->title }}</h2>
                    <p>{{$todo->description}}</p>
                    <p class="font-semibold">{{$todo->done ? __('Klar') : __('Inte klar')}}</p>

                    <x-primary-button class="ms-3">
                        <a href="{{ route('todo.edit', $todo->id) }}">Redigera</a>
                    </x-primary-button>

                    <form method="post" action="{{ route('todo.destroy', $todo->id) }}" class="">
                        @csrf
                        @method('delete')
                        <x-primary-button class="ms-3">
                            <input type="submit" value="Ta bort">
                        </x-primary-button>
                    </form>

                </div>
            </div>
            @endforeach


        </div>
    </div>
</x-app-layout>