<?php

// app/Models/HistoriqueProduit.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueProduit extends Model
{
    use HasFactory;

    protected $fillable = ['produit_id', 'action', 'details', 'user_id'];
    
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
