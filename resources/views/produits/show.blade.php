@extends('layouts.app')

@section('content')
    <h1>Détails du produit</h1>
    
    <div class="card">
        <div class="card-body">
            @if($produit->image)
                <img src="{{ asset('storage/' . $produit->image) }}" class="img-fluid mb-3">
            @endif
            
            <h5 class="card-title">{{ $produit->nom }}</h5>
            <p class="card-text">{{ $produit->description }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Prix: {{ number_format($produit->prix, 2) }} MAD</li>
                <li class="list-group-item">Quantité en stock: {{ $produit->quantite }}</li>
            </ul>
            
            <div class="mt-3">
                <a href="{{ route('produits.edit', $produit) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection