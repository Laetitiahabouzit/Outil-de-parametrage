<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    public function verifyLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (!empty($username) && !empty($password)) {
            $user = DB::table('utilisateurs')
                ->select('role', 'id_user', 'id_promo')
                ->where('pseudo', $username)
                ->where('password', $password)
                ->first();

            if ($user) {
                session(['username' => $username]);
                session(['id_user' => $user->id_user]);
                session(['id_promo' => $user->id_promo]);

                if ($user->role == "Formateur") {
                    return redirect('formateur');
                } else if ($user->role == "Eleve") {
                    return redirect('eleve');
                }
            } else {
                return redirect('login')->with('erreur', 1);
            }
        } else {
            return redirect('login')->with('erreur', 2);
        }

        return redirect('login');
    }
}
