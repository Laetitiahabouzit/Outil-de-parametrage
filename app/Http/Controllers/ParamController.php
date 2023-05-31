<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Param; // Assurez-vous d'importer le modèle Param

class ParamController extends Controller
{
    public function save(Request $request)
    {
        $idscenario = $request->input('idscenario');
        $ports = $request->input('port');
        $uds = $request->input('ud');
        $debuts = $request->input('debut');
        $fins = $request->input('fin');

        // Validation des données si nécessaire

        for ($i = 0; $i < count($ports); $i++) {
            $param = new Param();
            $param->scenario = $idscenario;
            $param->port = $ports[$i];
            $param->type_flux = $uds[$i];
            $param->debut = $debuts[$i];
            $param->fin = $fins[$i];
            $param->save();
        }

        // Redirection ou autre logique après la sauvegarde

        return redirect()->back()->with('success', 'Les paramètres ont été enregistrés avec succès.');
    }
}
