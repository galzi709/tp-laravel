<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use App\Mail\ArticleCreated; // (à activer seulement si Mail configuré)
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Afficher la liste des articles
     */
    public function index()
    {
        $articles = Article::with(['user', 'type'])->latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Formulaire création article
     */
    public function create()
    {
        $types = Type::all();
        return view('articles.create', compact('types'));
    }

    /**
     * Enregistrer un article
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'type_id' => 'required|exists:types,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Upload image
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        // Création article
        $article = auth()->user()->articles()->create([
            'title' => $request->title,
            'content' => $request->content,
            'type_id' => $request->type_id,
            'image' => $imagePath,
        ]);

        // EMAIL (désactivé pour éviter erreur)
        // Mail::to(auth()->user()->email)->send(new ArticleCreated($article));

        return redirect()->route('articles.index')
            ->with('success', 'Article créé avec succès !');
    }

    /**
     * Afficher un article
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Formulaire édition
     */
    public function edit(Article $article)
    {
        $types = Type::all();
        return view('articles.edit', compact('article', 'types'));
    }

    /**
     * Mise à jour article
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'type_id' => 'required|exists:types,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $article->image;

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'type_id' => $request->type_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Article mis à jour !');
    }

    /**
     * Supprimer article
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article supprimé !');
    }
}