<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900">

                    @isset($todo)
                    <form method="post" action="{{ route('todo.update', $todo->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <input type="text" name="title" value="{{$todo->title}}">
                        <input type="text" name="description" value="{{$todo->description}}">
                        <input type="text" name="done" value="{{$todo->done}}">
                        <input type="submit" value="Uppdatera">
                    </form>
                    @endisset
                    @empty($todo)
                    <form method="post" action="{{ route('todo.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <input type="text" name="title" value="">
                        <input type="text" name="description" value="">
                        <input type="text" name="done" value="">
                        <input type="submit" value="Skapa">

                    </form>
                    @endempty

                </div>
            </div>


        </div>
    </div>
</x-app-layout>