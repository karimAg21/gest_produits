<?php
// app/Console/Commands/SupprimerProduitsFaibleQuantite.php
namespace App\Console\Commands;

use App\Models\Produit;
use Illuminate\Console\Command;

class SupprimerProduitsFaibleQuantite extends Command
{
    protected $signature = 'produits:supprimer-faible-quantite';
    protected $description = 'Supprime les produits avec une quantité inférieure à 5';
    
    public function handle()
    {
        $count = Produit::where('quantite', '<', 5)->delete();
        
        $this->info("$count produits avec une quantité inférieure à 5 ont été supprimés.");
        
        return 0;
    }
}