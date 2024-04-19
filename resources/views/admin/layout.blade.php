<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.1.2-web/css/all.css') }}">
    <title>Tableau de bord</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    @yield('script')
  </head>
  <body>
            <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-2 me-0 px-3" href="/">E-SAKAFO</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="{{url('/')}}"><i class="fas fa-eye"></i> Voir le site</a>
                </div>  
            </div>
            <div class="navbar-nav">
                    <div class="nav-item text-nowrap">
                        <a class="nav-link px-3" href="/logout"><i class="fas fa-bell"></i></a>
                    </div>  
            </div>
            <div class="navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link px-3" href="/logout"><i class="fas fa-user fa-fw"></i>  Log out</a>
                    </div>  
            </div>

            
            </header>
<div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.admin') }}">
                    <span data-feather="home"></span>
                    Gérer les Restaurant
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categorie')}}">
                    <span data-feather="shopping-cart"></span>
                    Gérer les catégories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user">
                    <span data-feather="users"></span>
                    Gérer les Utilisateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                    <span data-feather="file"></span>
                   Gérer les commandes
                    </a>
                </li>

                </ul>
            </div>
            </nav>
        </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 py-md-2">
        @yield('content')
    
    
    </main>

</div>
<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>