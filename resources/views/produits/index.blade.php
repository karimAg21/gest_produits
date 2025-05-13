@extends('layouts.app')

@section('content')
    <h1>Liste des Produits</h1>
    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->id }}</td>
                <td>
    @if ($produit->image)
        <!-- Afficher le chemin pour débogage (à retirer après) -->
        <!-- <small>{{ asset('storage/' . $produit->image) }}</small> -->
        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" style="width: 50px; height: 50px;">
    @else
        Pas d'image
    @endif
</td>
                <td>{{ $produit->nom }}</td>
                <td>{{ number_format($produit->prix, 2) }} MAD</td>
                <td>{{ $produit->quantite }}</td>
                <td>
                    <a href="{{ route('produits.show', $produit) }}" class="btn btn-info btn-sm">Details</a>
                    <a href="{{ route('produits.edit', $produit) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $produits->links() }}
@endsection