<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TodoList') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900">

                    @isset($todolist)
                    <form method="post" action="{{ route('todolist.update', $todolist->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <input type="text" name="title" value="{{$todolist->title}}">
                        <input type="text" name="description" value="{{$todolist->description}}">
                        <input type="submit" value="Uppdatera">
                    </form>
                    @endisset
                    @empty($todolist)
                    <form method="post" action="{{ route('todolist.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <input type="text" name="title" value="">
                        <input type="text" name="description" value="">
                        <input type="submit" value="Skapa">

                    </form>
                    @endempty

                </div>
            </div>


        </div>
    </div>
</x-app-layout>