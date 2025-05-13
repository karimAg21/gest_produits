@extends('layouts.app')

@section('content')
    <h1>Modifier le produit</h1>
    
    <form action="{{ route('produits.update', $produit) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $produit->nom }}" required>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if($produit->image)
                <div>
                    <img src="{{ asset('storage/' . $produit->image) }}" width="100" class="mb-2">
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image">
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $produit->description }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ $produit->prix }}" required>
        </div>
        
        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $produit->quantite }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection