<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    public function accueil()
    {
        $quizList = [];
        $timesArray = [];

        if (session('username') && session('id_user')) {
            $user = session('username');
            $iduser = session('id_user');

            if (session('id_promo') !== "") {
                $idpromo = session('id_promo');

                $quizList = DB::table('quiz')->where('id_promo', $idpromo)->get();

                $timesArray = DB::table('quiz')
                    ->where('id_promo', $idpromo)
                    ->pluck('id_quiz', ['start_time', 'end_time'])
                    ->all();
            }
        }

        return view('eleve', compact('quizList', 'timesArray', 'user', 'idpromo'));
    }
}
