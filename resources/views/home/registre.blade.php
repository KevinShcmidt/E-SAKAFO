@extends('./layout')

@section('script')
<link rel="stylesheet" href="{{ asset('CSS/connexion.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
@endsection
@section('content')
<section class="section1">
    <div class="gbl">
       <div class="containt">
           <div class="ttl">
               <h2>S'enregistrer</h2>
               <div class="ligne"></div>
           </div>
           <form action="" method="POST">
            @csrf
            @method('POST')
               <input type="text" placeholder="Votre Nom" name="name">
               <input type="email" placeholder="Votre adresse Email" name="mail">
               <input type="password" placeholder="Mot de pass" name="mdp">
               <input type="password" placeholder="Veuiller retaper le mot de pass" name="checkmdp">
               <button name="submit">Enregistrer</button>
           </form>

       </div>
    </div>
   </section>
@endsection