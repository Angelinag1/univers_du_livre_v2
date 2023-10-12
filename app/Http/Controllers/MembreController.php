<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membre;
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
        $username = $request->input('username');
        $password = $request->input('password');
        $membre = Membre::where('username', $username)->first();
        if ($membre) {
            // Utilisez password_verify pour comparer le mot de passe fourni avec le mot de passe haché
            if (Hash::check($password, $membre->mot_de_passe)) {
                // Authentification réussie, connectez l'utilisateur
                Auth::login($membre);
                // Redirigez l'utilisateur vers la page souhaitée (par exemple, "livres.index")
                return redirect()->route('livres.index');
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
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'username' => $request->input('username'),
            'adresse' => $request->input('adresse'),
            'mot_de_passe' => Hash::make($request->input('mot_de_passe')), // Utilisez Hash::make pour crypter le mot de passe
        ]);

        $membre->save();
        Auth::login($membre);
        return redirect()->route('livres.index')->with('success', 'Inscription réussie !');
    }
}
