<x-app-layout>
    <h1>{{ $article->title }}</h1>

    <p>{{ $article->content }}</p>

    <p>Type: {{ $article->type->name }}</p>

    <a href="{{ route('articles.index') }}">Retour</a>
</x-app-layout>