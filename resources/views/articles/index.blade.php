<x-app-layout>

    <div class="max-w-5xl mx-auto py-6">

        <!-- MESSAGE SUCCESS -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-800">
                📚 Liste des articles
            </h1>

            <a href="{{ route('articles.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-full shadow-lg transition flex items-center gap-2">

                 ➕ Nouveau article
            </a>

        </div>

        <!-- LISTE ARTICLES -->
        @forelse($articles as $article)
            <div class="bg-white shadow-md rounded-lg p-5 mb-5 hover:shadow-lg transition">

                <!-- TITRE -->
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $article->title }}
                </h2>

                <!-- INFOS -->
                <p class="text-sm text-gray-500 mt-1">
                    👤 {{ $article->user->name }}
                    • 🏷️ {{ $article->type->name }}
                </p>

                <!-- CONTENU -->
                <p class="mt-3 text-gray-700">
                    {{ $article->content }}
                </p>

                <!-- IMAGE -->
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}"
                         class="mt-4 rounded-lg w-60 shadow">
                @endif

                <!-- ACTIONS -->
                <div class="mt-4 flex gap-4 text-sm">

                    <!-- SHOW -->
                    <a href="{{ route('articles.show', $article->id) }}"
                       class="text-blue-600 hover:underline">
                        👁 Voir
                    </a>

                    <!-- EDIT -->
                    <a href="{{ route('articles.edit', $article->id) }}"
                       class="text-yellow-600 hover:underline">
                        ✏ Modifier
                    </a>

                    <!-- DELETE -->
                    <form action="{{ route('articles.destroy', $article->id) }}"
                          method="POST"
                          onsubmit="return confirm('Supprimer cet article ?')">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 hover:underline">
                            🗑 Supprimer
                        </button>

                    </form>

                </div>

            </div>
        @empty
            <p class="text-gray-500">
                Aucun article trouvé.
            </p>
        @endforelse

    </div>

</x-app-layout>