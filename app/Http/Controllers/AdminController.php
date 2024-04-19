<?php

namespace App\Http\Controllers;


use App\Models\Restaurant;
use App\Models\Categorie;
use App\Models\Menu;
use App\Http\Requests\RestoRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index(): object{
        $restaurants = Restaurant::paginate(3);
        return View('admin.admin', [
            'restaurants' => $restaurants
        ]);
    }
    public function store(Request $request){
        $resto = new Restaurant;
        $resto->name = $request->name; 
        $resto->adresse = $request->adresse;
        $logo = $request->logo;
        $logoPath = $logo->store('logoResto', 'public');
        $resto->logo = $logoPath;
        $resto->phone = $request->phone;
        $resto->heure_ouverture = $request->ouverture;
        $resto->heure_fermeture = $request->fermeture;
        $resto->save();
         return redirect()->route('admin.admin')->with('success', 'Nouveau restaurant ajouter');
       
    }
    public function Delete(Restaurant $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Restaurant supprimé');
    }
    public function IndexUpdate() {
        return view('admin.update');
    }
    public function Update(Request $request, $id){
        $resto = Restaurant::find($id);
        if($request->name){
            $resto->name = $request->name;
        }
        if($request->adresse){
            $resto->adresse = $request->adresse;
        }if($request->logo){
            $logo = $request->logo;
            $logoPath = $logo->store('logoResto', 'public');
            $resto->logo = $logoPath;
        }if($request->phone){
            $resto->phone = $request->phone;
        }if($request->heure_ouverture){
            $resto->heure_ouverture = $request->heure_ouverture;
        }if($request->heure_fermeture){
            $resto->heure_fermeture = $request->heure_fermeture;
        }
        $resto->update();
        return redirect()->back()->with('success', 'Restaurant à jour');
    }
    public function Menu(string $slug, Restaurant $id)
    {
        $menus = Menu::all();
        $categories = Categorie::all();
       return view('admin.kaly', [
            'menus' => $menus,
            'restaurant' => $id,
            'categories'  => $categories
        ]);
    }
    public function storeMenu(Request $request){
        $menu = new Menu;
        $menu->name = $request->name; 
        $menu->price = $request->price;
        $logo = $request->photo;
        $logoPath = $logo->store('logoResto', 'public');
        $menu->photo = $logoPath;
        $menu->restaurant_id = $request->restaurant_id;
        $menu->categorie_id = $request->categorie_id;
        $menu->save();
         return redirect()->back()->with('success', 'Nouveau menu ajouter');
       
    }
    public function updateMenuIndex() :view{
        return view('admin.updateMenu');
    }
    public function updateMenu(Request $request, $id){
        $menu = Menu::find($id);
        if($request->name){
            $menu->name = $request->name;
        }
         if($request->price){
            $menu->price = $request->price;
         }
        if($request->photo){
            $logo = $request->photo;
            $logoPath = $logo->store('logoResto', 'public');
            $menu->photo = $logoPath;
        }
        $menu->Update();
        return redirect()->back()->with('success', 'Menu à jour');
    }
    public function DelMenu(Menu $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Un menu a été supprimer');
    }

    public function IndexCategorie()
    {
        $categories = Categorie::all();
        return view('admin.categorie', [
            'categories' => $categories
        ]);
    }

    public function delCategorie(Categorie $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Une categorie supprimée!');
    }

    public function PostCategorie(Request $request)
    {
        $categorie = new Categorie;
        $categorie->nom = $request->name;
        $categorie->save();
        return redirect()->back()->with('success', 'Une nouvelle categorie a été Ajouter!');
    }

}
