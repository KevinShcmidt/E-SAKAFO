@extends('./layout')
@section('script')
<link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
@endsection
@section('content')
<section class="section1">
    <div class="desc">
        <h1>Le meilleur des restaurants de Tana  livré chez vous</h1>
        <form action="" method="POST">
            <input type="search" placeholder="restaurant" name="resto">
            <button>Recherchez</button>
        </form>
    </div>
</section>
<section class="section2">
    <h2 id="resto">Restaurants</h2>
    <div class="containt">
        <div class="filter">
            <div class="title">
                <h3>Filtre</h3>
            </div>
            <p>Selon le type de cuisine</p>
            <form action="" method="get">
                <div class="left">
                    <div class="inpt">
                        <input type="checkbox" id="street" name="menu[]" value="halal">
                        <label for="street">halal</label>
                    </div>
                    <div class="inpt">
                        <input type="checkbox" id="street" name="menu[]" value="vegetarien">
                        <label for="street">végétarien</label>
                    </div>
                    <div class="inpt">
                        <input type="checkbox" id="street" name="menu[]" value="fastfood">
                        <label for="street">Fast Food</label>
                    </div>
                    <div class="inpt">
                        <input type="checkbox" id="street" name="menu[]" value="burger">
                        <label for="street">burger</label>
                    </div>
                    <div class="inpt">
                        <input type="checkbox" id="street" name="menu[]" value="tacos">
                        <label for="street">Tacos</label>
                    </div>
                    <div class="inpt">
                        <input type="checkbox" id="street" name="menu[]" value="pizza">
                        <label for="street">Pizza</label>
                    </div>
                    
                </div>
                <button class="fil"><i class="fas fa-check"></i></button>
            </form>
        </div>
        <div class="resto">
         @foreach($restaurants as $resto)
            <div class="box">
                <div class="img">
                    <img src="{{ $resto->logoUrl() }}" alt="">
                </div>
                @php
                $heureNow = now()->format('H:i:s');
                @endphp
                @if($heureNow >= $resto->heure_ouverture && $heureNow <= $resto->heure_fermeture)
                <div class="ouvert">
                    <p>OUVERT</p>
                </div>
                @else
                <div class="ferme">
                    <p>FERME</p>
                </div>
                @endif
                <div class="ds">
                    <h3>{{ $resto->name }}</h3>
                    <div class="lieu">
                        <div class="addres">
                            <i class="fas fa-map-marker"></i>
                            <p>{{ $resto->adresse }}</p>
                        </div>
                        <div class="btn">
                            <p><a href="{{ route('resto.index', $resto->id) }}">Commandez</a></p>
                        </div>
                    </div>
                </div>
            </div>
       
        
        @endforeach
        </div>
    </div>
</section>
@endsection