<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membre;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MembreController extends Controller
{
    public function login()
    {
        return view('connexion');
    }

    public function authenticate(Request $request)
    {
        // Validez les données d'entrée
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // Les données d'entrée ne sont pas valides, redirigez vers la page de connexion avec des erreurs de validation
            return redirect()->route('connexion')->withErrors($validator)->withInput();
        }

        $username = $request->input('username');
        $password = $request->input('password');

        $membre = Membre::where('username', $username)->first();
        if ($membre) {
            if (Hash::check($password, $membre->mot_de_passe)) {
                // Authentification réussie, connectez l'utilisateur
                Auth::login($membre);
                // Redirigez l'utilisateur vers la page souhaitée (par exemple, "livres.index")
                return redirect()->route('livres.index');
            } else {
                // Le mot de passe ne correspond pas, redirigez vers la page de connexion avec un message d'erreur
                return redirect()->route('connexion')->with('error', 'Mot de passe incorrect');
            }
        }

        // Identifiants invalides, redirigez de nouveau vers la page de connexion avec un message d'erreur
        return redirect()->route('connexion')->with('error', 'Identifiants invalides');
    }

    public function logout()
    {
        Auth::logout(); // Déconnexion de l'utilisateur actuel
        return redirect()->route('livres.index'); // Redirigez vers la page d'accueil ou une autre page de votre choix
    }
    public function inscriptionForm()
    {
        return view('inscription');
    }
    public function inscrire(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'username' => 'required|unique:membre',
            'adresse' => 'required|email|unique:membre',
            'mot_de_passe' => 'required',
        ]);

        $membre = new Membre([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'username' => $request->input('username'),
            'adresse' => $request->input('adresse'),
            'mot_de_passe' => $request->input('mot_de_passe'),
        ]);

        $membre->save();
        Auth::login($membre);
        return redirect()->route('livres.index')->with('success', 'Inscription réussie !');
    }
}
