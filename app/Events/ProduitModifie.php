<?php
// app/Events/ProduitModifie.php
namespace App\Events;

use App\Models\Produit;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProduitModifie
{
    use Dispatchable, SerializesModels;

    public $produit;
    public $action;

    public function __construct(Produit $produit, $action)
    {
        $this->produit = $produit;
        $this->action = $action;
    }
}