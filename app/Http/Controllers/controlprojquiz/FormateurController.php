<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormateurController extends Controller
{
    public function accueil()
    {
        $quizList = $this->getQuizList(auth()->user()->id_user);
        return view('formateur.accueil', ['quizList' => $quizList]);
    }

    public function creer()
    {
        // Logique pour la création de quiz
        return view('formateur.creer');
    }

    public function modifier()
    {
        // Logique pour la modification de quiz
        return view('formateur.modifier');
    }

    public function corriger()
    {
        // Logique pour la correction de quiz
        return view('formateur.corriger');
    }

    public function consulter()
    {
        // Logique pour la consultation des copies
        return view('formateur.consulter');
    }

    public function modifierQuiz($id_quiz)
    {
        // Logique pour la modification d'un quiz spécifique
        return view('formateur.modifierQuiz', ['id_quiz' => $id_quiz]);
    }

    public function corrigerEleve($id_quiz)
    {
        // Logique pour la correction des copies d'un quiz spécifique
        return view('formateur.corrigerEleve', ['id_quiz' => $id_quiz]);
    }

    private function getQuizList($id_user)
    {
        $quizList = DB::table('quiz')
            ->select('id_quiz', 'nom', 'start_time', 'end_time')
            ->where('id_formateur', $id_user)
            ->get();

        $current_time = time();

        return $quizList->map(function ($quiz) use ($current_time) {
            $start_time = strtotime($quiz->start_time);
            $end_time = strtotime($quiz->end_time);

            return [
                'id_quiz' => $quiz->id_quiz,
                'nom' => $quiz->nom,
                'start_time' => $quiz->start_time,
                'end_time' => $quiz->end_time,
                'isUpcoming' => $current_time < $start_time,
                'isInProgress' => $current_time >= $start_time && $current_time <= $end_time,
            ];
        });
    }
}
