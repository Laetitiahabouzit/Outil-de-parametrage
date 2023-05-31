<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Scenario;

class ScenarioController extends Controller
{

    public function index()
    {
        $scenarios = Scenario::all();
        return view('chxscenario')->with('scenarios', $scenarios);
    }

    public function save(Request $request)
    {
        // Récupération des données du formulaire
        $nom = $request->input('nom');
        $intervalle = $request->input('intervalle');
        $p1 = $request->input('p1');
        $p2 = $request->input('p2');
        $p3 = $request->input('p3');

        // Insérer les données dans la base de données
        $idscenario = DB::table('scenario')->insertGetId([
            'nom' => $nom,
            'intervalle' => $intervalle,
        ]);

        DB::table('port_scenario')->insert([
            ['port' => 1, 'scenario' => $idscenario, 'numport' => $p1],
            ['port' => 2, 'scenario' => $idscenario, 'numport' => $p2],
            ['port' => 3, 'scenario' => $idscenario, 'numport' => $p3],
        ]);

        // Enregistrer l'ID du scénario dans la session
        Session::put('idscenario', $idscenario);

        // Rediriger vers la page de paramétrage
        return redirect()->route('inter2proj');
    }
}
