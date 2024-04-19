@extends('../admin/layout')
@section('content')
    <div class="container my-5">
        @if(session('success'))

            <P class="alert alert-success">
                {{  session('success') }}
            </P>

        @endif
        <div class="row">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    <th>Logo</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Contact</th>
                    <th>Heure Ouverture</th>
                    <th>Heure fermeture</th>
                    <th></th>
                    
                </thead>
                @foreach($restaurants as $resto)
                <tbody>
                    <td><img style="width: 100px; height:100px; object-fit:cover; border-radius: 5px; border:1px solid rgba(128, 128, 128, 0.521)" src="{{ $resto->logoUrl() }}" alt=""></td>
                    <td>{{ $resto->name }}</td>
                    <td>{{ $resto->adresse }}</td>
                    <td>{{ $resto->phone }}</td>
                    <td>{{ $resto->heure_ouverture }}</td>
                    <td>{{ $resto->heure_fermeture }}</td>
                    <td style="font-size:1px; width: 200px">                        
                        <a href="{{ route('admin.menu', [$resto->name, $resto->id] ) }}"><i class="fas fa-eye"></i></a>
                        <a href="{{route('admin.update', $resto->id)}}"><i class="fas fa-edit m-2"></i></a>
                        <a href="{{ route('admin.delete', $resto->id ) }}"><i class="fas fa-trash-alt" style="color:red"></i></a>
                    </td>
                </tbody>
                @endforeach
                
                
            </table>
            <div class="d-flex justify-content-center">
                {{ $restaurants->links()}}
            </div>
        </div>
        <form style="box-shadow: 0px 0px 2px 0.5px;height: 500px;border-radius:5px; padding:20px" action="" method="post" class="vstack form gap-2 col-md-3" enctype="multipart/form-data">
            <div class="title center mb-2">Ajouter un nouveau Restaurant</div>
            @csrf
            @method("POST")
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
            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    </div>
@endsection