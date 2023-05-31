<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    protected $table = 'params'; // Nom de la table dans la base de données

    public $timestamps = false; // Active les timestamps

    protected $fillable = ['scenario', 'port', 'type_flux', 'debut', 'fin']; // Liste des colonnes pouvant être affectées en masse (mass assignment)

    // Si besoin, vous pouvez également définir des relations avec d'autres modèles ici
}
