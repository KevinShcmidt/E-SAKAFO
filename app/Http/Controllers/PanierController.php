<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use App\Models\Menu;
use App\Models\Panier;

class PanierController extends Controller
{
    public function Index()
    {
        $user = Auth::id();
        $paniers = Panier::where('user_id', $user)->get();
        $panierNumber = Panier::where('user_id', $user)->count();

        $somme = Panier::where('user_id', $user)->sum('total_price');
        return view('home.panier', 
    [
        'paniers' => $paniers,
        'somme' => $somme,
        'panierNumber' => $panierNumber
    ]
    );
    }
    public function SupprP(Panier $id){
        $id->delete();
        return redirect()->back()->with('success', 'Vous avez supprimé Un Produit !');
    }
    public function Store(Request $request){
        
        $menuExiste = Panier::where('menu_id', $request->menu_id)->exists();
        if ($menuExiste) {
           $menu = Panier::where('menu_id', $request->menu_id)->first();
           $menu->quantity += 1;
           $menu->total_price = $request->menu_price * $menu->quantity; 
           $menu->update();
        }
        else{
            $panier = new Panier;
            $panier->user_id = Auth::id();
            $panier->restaurant_id = $request->restaurant_id;
            $panier->menu_id = $request->menu_id;
            $panier->quantity = 1;
            $panier->total_price = $request->menu_price;
            $panier->save();
        }

        return redirect()->back();
        
    }
}
