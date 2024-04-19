@extends('./layout')
@section('script')
<link rel="stylesheet" href="{{ asset('CSS/connexion.css') }}">
@endsection 
@section('content')
    <section class="section1">
     <div class="gbl">
        <div class="containt">
            <div class="log">
                <img src="image/Icon.ico" alt="">
            </div>
            <div class="ttl">
                <h2>Commençons</h2>
                <div class="ligne"></div>
            </div>
            <form action="" method="POST">
                @csrf
                @method('POST')
                <input type="email" placeholder="Votre adresse Email" name="email">
                <input type="password" placeholder="Mot de pass" name="password">
                <button name="submit">connexion</button>
            </form>
            <div class="identifier">
                <a href="{{route('registre')}}">S'inscrire</a>
            </div>
        </div>
     </div>
    </section>
@endsection