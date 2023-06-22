<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function show($idtest)
    {
        // Récupération des données à partir du modèle Test
        $testData = Test::find($idtest);

        // Retourne la vue 'graph.blade.php' en passant les données nécessaires
        return view('graph', ['idtest' => $idtest, 'testData' => $testData]);
    }

    public function getGraphData($idtest)
    {
        $query = DB::table('detail_log')
            ->select('*')
            ->where('idtest', $idtest)
            ->get();
    
        // Utilisez toArray() pour convertir la collection en tableau
        $data = $query->toArray();
    
        return response()->json($data);
    }
    
}