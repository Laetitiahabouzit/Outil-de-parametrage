<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = ['id_user', 'id_promo', 'pseudo', 'password', 'role'];
}
