@extends('./layout')
@section('script')
<link rel="stylesheet" href="{{ asset('CSS/panier.css') }}">
<Script src="{{ asset('JS/update.js') }}" defer></Script>

@endsection 

@section('content')

<section class="section2">
    <div class="titre">
        <h2>Panier</h2>
    </div>
    <div class="ligne">
    </div>
    
    <div class="div2">
        <div class="content">
            <div class="kaly">
                <h2>Votre commande<hr></h2>
                @foreach($paniers as $panier)
                <div class="propo">
                    <div class="name">
                        <h3>{{$panier->menu->name}}</h3>
                    </div>
                    <div class="vidiny">
                        <p>{{$panier->menu->price}} Ar</p>
                    </div>
                    <div class="btn">
                        <form action="" method="GET" class="form">

                        </form>
                        <input type="text" class="value">
                        <button class="plus">+</button> 
                        <p class="nbrQ">{{$panier->quantity}}</p>  
                        <button class="moin">-</button>                     
                    </div>
                    <div class="del">
                        <a href="{{route('retire', $panier->id)}}"><i class="fas fa-trash-alt"></i></a>
                    </a></form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="pan">
            <div class="top">
                <div class="ttl">
                    <i class="fas fa-cart-arrow-down"></i>
                    <p>Résumé de votre commande</p>
                </div>
            </div>
            <div class="article">
                <div class="nom">
                    <p>Nombre de plats</p>
                </div>
                <div class="valeur">
                   
                    <p>{{$panierNumber}}</p>
                   
                </div>
            </div>
            <hr>
            <div class="somme">
                <h3>Montant à payer</h3>
                <p>{{$somme}} Ar</p>
            </div>
            <div class="envoyer">
                <button>Passer au payement</button>
            </div>
        </div>
    </div>
</section>
@endsection