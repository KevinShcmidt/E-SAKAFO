<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Categorie;
use App\Models\Menu;
use App\Models\Panier;

class RestaurantController extends Controller

{
    public function Index(string $id)
    {
        $restaurant = Restaurant::find($id);
        $paniers = Panier::all();
        $somme = Panier::sum('total_price');
        
        $menus = Menu::with('categorie')->where('restaurant_id', $restaurant->id)->get();
        $categories = [];
        $lastCat = null;

        foreach($menus as $menu){
            if($menu->categorie->nom !== $lastCat){
                array_push($categories, $menu->categorie->nom);
            }
            $lastCat = $menu->categorie->nom;
        }
        return view('home.resto', [
            'restaurant' => $restaurant,
            'menus' => $menus,
            'categories' => $categories,
            'paniers' => $paniers,
            'somme' => $somme
        ]);
    }
    public function MenuApi()
    {
        $menus = Menu::with('categorie')->get();
        return response()->json($menus, 200);
    }

   
}
