<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // LISTE DES TYPES
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    // FORM CREATE
    public function create()
    {
        return view('types.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Type::create($request->all());

        return redirect()->route('types.index');
    }

    // SHOW
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    // EDIT
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    // UPDATE
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());

        return redirect()->route('types.index');
    }

    // DELETE
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('types.index');
    }
}