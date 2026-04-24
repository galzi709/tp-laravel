<x-app-layout>

    <h1 class="text-xl font-bold mb-4">Créer un article</h1>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-4 shadow rounded">

        @csrf

        <input type="text" name="title" placeholder="Titre"
               class="w-full border p-2 mb-3" required>

        <textarea name="content" placeholder="Contenu"
                  class="w-full border p-2 mb-3" required></textarea>

        <select name="type_id" class="w-full border p-2 mb-3" required>
            <option value="">-- Choisir un type --</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <input type="file" name="image" class="mb-3">

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded">
            Publier
        </button>

    </form>

</x-app-layout>