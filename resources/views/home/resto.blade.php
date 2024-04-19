@extends('./layout')

@section('script')
<link rel="stylesheet" href="{{ asset('CSS/resto.css') }}">
@endsection
@section('content')
<section class="section1">
    <div class="profil">
        <div class="pdp">
            <img src="{{ $restaurant->logoUrl() }}" alt="">
        </div>
        <div class="bio">
            <div class="left">
                <div class="nom">
                    <h2>{{ $restaurant->name }}</h2>
                </div>
                <div class="location">
                    <i class="fas fa-map-marker"></i>
                    <p>{{ $restaurant->adresse }}</p>
                </div>
                <div class="info">
                    <div class="heure">
                        <i class="fas fa-clock"></i>
                        <p>{{ $restaurant->heure_ouverture }} AM {{ $restaurant->heure_fermeture }}  PM</p>
                    </div>
                    <div class="phone">
                        <i class="fas fa-phone"></i>
                        <p>{{ $restaurant->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="right">
                @php
                $heureNow = now()->format('H:i:s');
                @endphp
                @if($heureNow >= $restaurant->heure_ouverture && $heureNow <= $restaurant->heure_fermeture)
                <div class="ouvert">
                    <p>OUVERT</p>
                </div>
                @else
                <div class="ferme">
                    <p>FERME</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="section2">
    <div class="titre">
        <h2>Commandez vos plats depuis {{ $restaurant->name }}</h2>
    </div>
    <div class="ligne">
    </div>
    <div class="menu">
        <i class="fas fa-book"></i>
        <p>Menu</p>
    </div>
    <div class="div2">
        <div class="content">
            <div class="slide">
                <i class="fas fa-angle-left sld"></i>
                <div class="listmenu">
                @foreach($categories as $cat)
                <a href="{{$cat}}">{{$cat}}</a>
                @endforeach
                </div>
                <i class="fas fa-angle-right sld"></i>
            </div>
            
            @foreach($categories as $cat)
            <div class="kaly">
                <h2 id="{{$cat}}">{{$cat}}<hr></h2>
                @foreach($menus as $menu)
                @if ($cat === $menu->categorie->nom)
                <div class="propo">
                    <div class="sary">
                        <img src="{{$menu->logoUrl()}}" alt="">
                    </div>
                    <div class="descri">
                        <div class="dsc">
                            <h3>{{$menu->name}}</h3>
                            <h4>{{$menu->price}} Ar</h4>
                        </div>
                        <div class="ajouter">
                        <form action="" method="POST">
                            @method('POST')
                            @csrf
                            <input type="text" value={{$menu->id}} name="menu_id" hidden>
                            <input type="text" value={{$restaurant->id}} name="restaurant_id" hidden>
                            <input type="number" value={{$menu->price}} name="menu_price" hidden>
                            <button name="ajouter">
                                <i class="fas fa-add"></i>
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
            
        </div>
        <div class="pan">
            
            <div class="top">
                <div class="ttl">
                    <i class="fas fa-cart-arrow-down"></i>
                    <p>Votre panier</p>
                </div>
                <div class="txt">
                    <p>{{count($paniers)}} Articles</p>
                </div>
                
            </div>
            @if($paniers)
            @foreach($paniers as $panier)
            <div class="article">
                <div class="nom">
                    <p>{{$panier->menu->name}}</p>
                </div>
                <div class="valeur">
                    <p>{{$panier->menu->price}} Ar</p>
                    <div class="btn">
                        <form action="" method="POST">
                            <button><div class="moin"><p>-</p></div></button>
                            <p class="nombre">{{$panier->quantity}}</p>
                            <button> <div class="plus"><p>+</p></div> </button> 
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="total">
                <h3>Sous-total</h3>
                <p>{{$somme}} Ar</p>
            </div>
            <div class="envoyer">
                <button>Continuer</button>
            </div>
        </div>
        
       
    </div>
</section>
@endsection