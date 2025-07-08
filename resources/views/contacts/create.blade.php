<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4">{{ __('Criar Contato') }}</h1>

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">{{ __('Erro!') }}</strong>
                            <span class="block sm:inline">{{ __('Por favor, corrija os erros abaixo.') }}</span>
                        </div>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('contacts.store') }}" class="p-6') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nome') }}</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mt-4">
                            <label for="contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Contato') }}</label>
                            <input type="text"  name="contact" id="contact" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
                            <input type="email"  name="email" id="email" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Criar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:underline">
                    {{ __('Voltar') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
