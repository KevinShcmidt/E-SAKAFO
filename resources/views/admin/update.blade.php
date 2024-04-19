@extends('../admin/layout')
@section('content')
    <div class="container my-5">
        @if(session('success'))

            <P class="alert alert-success">
                {{  session('success') }}
            </P>

        @endif
        
        <form style="box-shadow: 0px 0px 2px 0.5px;height: 500px;border-radius:5px; padding:20px" action="" method="post" class="vstack form gap-2 col-md-8" enctype="multipart/form-data">
            <div class="title center mb-2">Mettre à jour le Restaurant</div>
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="name">Nom du restaurant</label>
                @error('name')<label for="name">{{ $message }}</label>@enderror
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse du restaurant</label>
                @error('adresse')<label for="name">{{ $message }}</label>@enderror
                <input type="text" id="adresse" class="form-control" name="adresse">
            </div>
            <div class="form-group">
                <label for="logo">Logo du restaurant</label>
                @error('logo')<label for="name">{{ $message }}</label>@enderror
                <input type="file" id="logo" class="form-control" name="logo">
            </div>
            <div class="form-group">
                <label for="phone">Contact</label>
                @error('phone')<label for="name">{{ $message }}</label>@enderror
                <input type="text" id="phone" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="ouverture">Heure d'ouverture</label>
                @error('ouverture')<label for="name">{{ $message }}</label>@enderror
                <input type="time" id="ouverture" class="form-control" name="ouverture">
            </div>
            <div class="form-group">
                <label for="fermeture">Heure de fermeture</label>
                @error('fermeture')<label for="name">{{ $message }}</label>@enderror
                <input type="time" id="fermeture" class="form-control" name="fermeture">
            </div>
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
    </div>
@endsection