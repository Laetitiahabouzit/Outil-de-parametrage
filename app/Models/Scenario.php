<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table = 'scenario';
    protected $primaryKey = 'idscenario';
    public $timestamps = false;

    // Définissez les colonnes accessibles pour le modèle
    protected $fillable = [
        'nom',
        'intervalle',
    ];
}
