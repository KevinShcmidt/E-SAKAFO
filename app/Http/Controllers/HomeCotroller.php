<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Panier;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeCotroller extends Controller
{
    //
    public function Home() :object
    {
        $restaurants = Restaurant::all();
        $panier = Panier::all();
        return view('home.home', [
            'restaurants' => $restaurants,
            'panier' => $panier
        ]);
    }
    public function HomeApi() :object
    {
        $restaurants = Restaurant::all();
        $panier = Panier::all();
        return response()->json($restaurants, 200); 
          
    }
    public function LogIn()
    {
        return view('home.login');
    }
    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function Authentification(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = auth()->user();
            
                return redirect()->route('home');
            
        }else {
            return redirect()->back();
        }
    }
    public function Registre()
    {
        return view('home.registre');
    }

    public function StoreUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->mail;
        
        if($request->mdp === $request->checkmdp){
            $user->password = Hash::make($request->mdp);
        }
        $user->save();

        return redirect()->back()->with('success', 'nouveau utilisateur ajouté');
    }
}
