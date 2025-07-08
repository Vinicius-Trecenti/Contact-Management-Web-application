<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="mb-4">
                <a href="{{ route('contacts.create') }}" class="text-blue-600 hover:underline">
                    {{ __('Novo contato') }}
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-4">Lista de Contatos</h1>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Contato</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Data de Criação</th>
                                <th>Data de Atualização</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->contact }}</td>
                                    <td>{{ $contact->email }}</td>
                                    @if($contact->deleted_at)
                                        <td class="text-red-500">Excluído</td>
                                    @else
                                        <td class="text-green-500">Ativo</td>
                                    @endif
                                    <td>{{ $contact->created_at }}</td>
                                    <td>{{ $contact->updated_at }}</td>
                                    <td class="flex justify-center space-x-2 mt-2">
                                        @if(!$contact->deleted_at)
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Editar</a>

                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Excluir</button>
                                        </form>
                                        @endif
                                        @isset($contact->deleted_at)
                                            <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                                    Restaurar
                                                </button>
                                            </form>
                                        @endisset
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum contato encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
