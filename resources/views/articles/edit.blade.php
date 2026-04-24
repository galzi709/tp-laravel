<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Modifier l'article</h1>

    <form action="{{ route('articles.update', $article) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-4 shadow rounded">

        @csrf
        @method('PUT')

        <!-- Titre -->
        <input type="text"
               name="title"
               value="{{ $article->title }}"
               class="w-full border p-2 mb-3"
               required>

        <!-- Contenu -->
        <textarea name="content"
                  class="w-full border p-2 mb-3"
                  required>{{ $article->content }}</textarea>

        <!-- Type -->
        <select name="type_id"
                class="w-full border p-2 mb-3"
                required>

            @foreach($types as $type)
                <option value="{{ $type->id }}"
                    {{ $article->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach

        </select>

        <!-- Image -->
        <input type="file" name="image" class="mb-3">

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}"
                 width="200"
                 class="mb-3">
        @endif

        <!-- Bouton -->
        <button type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded">
            Modifier
        </button>

    </form>

</x-app-layout>