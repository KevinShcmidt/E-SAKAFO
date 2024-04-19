@extends('../admin/layout')
@section('content')
    <div class="container my-5">
        <img src="{{$restaurant->logoUrl()}}" style="width: 100px; height:100px; border-radius:50%" alt="" title="{{$restaurant->name}}"> 
        <h1>{{$restaurant->name}}</h1>
        <hr>
        <h4>Liste des menus</h4>
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
                    <th>Prix</th>
                    <th>Category</th>
                    <th></th> 
                </thead>
                @foreach($menus as $menu)
                @if($menu->restaurant_id == $restaurant->id)
                <tbody>
                    <td><img style="width: 100px; height:100px; object-fit:cover; border-radius: 5px; border:1px solid rgba(128, 128, 128, 0.521)" src="{{ $menu->logoUrl() }}" alt=""></td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->price }} MGA</td>
                    <td>@foreach($categories as $cat)
                        @if ($cat->id == $menu->categorie_id)
                           {{$cat->name}}
                        @endif
                        @endforeach</td>
                    <td style="font-size:5px;">
                        <a href="{{route('admin.updateMenu', $menu->id )}}"><i class="fas fa-edit m-2"></i></a>
                        <a href="{{ route('admin.delMenu', $menu->id ) }}"><i class="fas fa-trash-alt" style="color:red"></i></a>
                    </td>
                </tbody>
                
                @endif
                @endforeach
            </table>
        </div>
        <form style="box-shadow: 0px 0px 2px 0.5px;height: 400px;border-radius:5px; padding:20px" action="" method="post" class="vstack form gap-2 col-md-3" enctype="multipart/form-data">
            <div class="title center mb-2">Ajouter un nouveau Menu</div>
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="name">Nom du menu</label>
                @error('name')<label for="name">{{ $message }}</label>@enderror
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="price">Prix du Menu</label>
                @error('adresse')<label for="name">{{ $message }}</label>@enderror
                <input type="number" id="price" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="logo">Logo du Menu</label>
                @error('logo')<label for="name">{{ $message }}</label>@enderror
                <input type="file" id="logo" class="form-control" name="photo">
            </div>
                <input hidden type="number" name="restaurant_id" value="{{ $restaurant->id }}">
            <div class="form-group">
                <label for="categorie">Categotie</label>
                @error('fermeture')<label for="name">{{ $message }}</label>@enderror
                <select class="form-select" name="categorie_id" id="categorie">
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                    
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    </div>
@endsection