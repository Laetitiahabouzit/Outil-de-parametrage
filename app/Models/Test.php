<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test'; // Nom de la table dans la base de données

    protected $primaryKey = 'idtest'; // Clé primaire de la table

    public $timestamps = false; // Désactiver l'utilisation automatique des colonnes "created_at" et "updated_at"

    protected $fillable = ['scenario', 'nom', 'ts_debut']; // Liste des colonnes pouvant être affectées en masse

    // Définir les relations avec d'autres modèles si nécessaire

    // ...
}
