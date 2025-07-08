<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contato') }} {{ $contact->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4">{{ __('Detalhes do Contato') }}</h1>

                    <div class="mt-4">
                        <p><strong>{{ __('ID') }}:</strong> {{ $contact->id }}</p>
                        <p><strong>{{ __('Nome') }}:</strong> {{ $contact->name }}</p>
                        <p><strong>{{ __('Contato') }}:</strong> {{ $contact->contact }}</p>
                        <p><strong>{{ __('Email') }}:</strong> {{ $contact->email }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:underline">
                    {{ __('Voltar') }}
                </a>

                <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-600 hover:underline ml-4">
                    {{ __('Editar') }}
                </a>

                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline-block ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">
                        {{ __('Excluir') }}
                    </button>
                </form>

                @if($contact->deleted_at)
                    <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" class="inline-block ml-4">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-green-600 hover:underline">
                            {{ __('Restaurar') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
