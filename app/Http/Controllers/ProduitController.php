<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $produits = Produit::paginate(10);
        return view('produits.index', compact('produits'));
    }
    public function create()
    {
        return view('produits.create');
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'description' => 'nullable|string',
        'prix' => 'required|numeric|min:0',
        'quantite' => 'required|integer|min:0',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('produits', 'public');
        $validated['image'] = $path;
    }

    Produit::create($validated);

    return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
}

    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }
    public function update(Request $request, Produit $produit)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'quantite' => 'required|integer|min:0',
        ]);

        $produit->update($validated);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $produits = Produit::where('nom', 'LIKE', "%{$query}%")
    ->orWhere('description', 'LIKE', "%{$query}%")
    ->paginate(10);
        return view('produits.index', compact('produits'));
    }
}
