<?php

// app/Listeners/EnregistrerHistoriqueProduit.php
namespace App\Listeners;

use App\Events\ProduitModifie;
use App\Models\HistoriqueProduit;

class EnregistrerHistoriqueProduit
{
    public function handle(ProduitModifie $event)
    {
        HistoriqueProduit::create([
            'produit_id' => $event->produit->id,
            'action' => $event->action,
            'details' => json_encode($event->produit->getChanges()),
            'user_id' => auth()->id()
        ]);
    }
}