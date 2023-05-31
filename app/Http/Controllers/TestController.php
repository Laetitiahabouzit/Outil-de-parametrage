<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index($idscenario)
    {
        $requete = DB::table('test')->where('scenario', $idscenario)->get();

        if ($requete->isEmpty()) {
            return "Il n'y a pas encore de test pour ce scénario.";
        }

        $tests = $requete->all();

        return view('listetest', ['tests' => $tests]);
    }
}
