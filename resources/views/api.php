<?php

$idtest = $_GET["idtest"];

use Illuminate\Support\Facades\DB; // Importez la classe DB

$requete = DB::table('detail_log')
    ->select('*')
    ->where('idtest', $idtest)
    ->get();

header("Content-type: application/json");
echo json_encode($requete);
