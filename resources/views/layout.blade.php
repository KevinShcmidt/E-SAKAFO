@php
    $user = Illuminate\Support\Facades\Auth::id();
    
    if ($user) {
        $total = App\Models\Panier::where('user_id', $user)->count();
    }else{
        $total = 0;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @yield('script')
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            E-sakafo
        </div>
        <div class="nav">
            <ul>
                <li><a href="{{url('/')}}">Accueil</a></li>
                <li><a href="home.php#resto">Commandez</a></li>
                <li><a href="contact.html">Contactez-food</a></li>
                <li class="panier"><a href="{{route('panier')}}"><i class="fas fa-cart-arrow-down"></i></a>
                <div class="nbr">{{$total}}</div>
                </li>
                @guest
                <li class="connex"><a href="{{route('login')}}">Se connecter</a></li>
                @else
                <li class="connex"><a href="{{route('logout')}}"><i class="fas fa-user"></i></a></li>
                @endguest
            </ul>
        </div>
    </header>
    @if(session('success'))

            <P class="alert alert-success">
                {{  session('success') }}
            </P>

        @endif
    @yield('content')
</body>
</html>