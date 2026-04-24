<x-app-layout>

    <div class="max-w-5xl mx-auto py-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-800">
                🏷️ Gestion des Types
            </h1>

        </div>

        <!-- TABLE CARD -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border">

            <table class="w-full text-sm text-left">

                <!-- HEADER -->
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Nom</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">

                    @forelse($types as $type)

                        <tr class="hover:bg-gray-50 transition">

                            <!-- ID -->
                            <td class="p-4 font-medium text-gray-700">
                                #{{ $type->id }}
                            </td>

                            <!-- NOM -->
                            <td class="p-4 font-semibold text-gray-900">
                                {{ $type->name }}
                            </td>

                            <!-- ACTIONS -->
                            <td class="p-4 flex space-x-4">

                                <!-- EDIT -->
                                <a href="{{ route('types.edit', $type) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium transition">
                                    ✏️ Modifier
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('types.destroy', $type) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer ce type ?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 hover:text-red-800 font-medium transition">
                                        🗑 Supprimer
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="p-6 text-center text-gray-500">
                                Aucun type disponible 😕
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>