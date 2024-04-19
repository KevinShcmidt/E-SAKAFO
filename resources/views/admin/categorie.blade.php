@extends('../admin/layout')
@section('content')
    <div class="container my-5">
        @if(session('success'))

            <P class="alert alert-success">
                {{  session('success') }}
            </P>

        @endif

        <h2>Liste des Catégories</h2>
        <div class="row">
        <div class="col-md-9">
            <table class="table">
                <thead>
                    
                    <th>Nom</th>
                    
                    <th></th> 
                </thead>
                @foreach($categories as $cat)
                <tbody>
                    <td>{{ $cat->nom }}</td>
                    <td style="font-size:5px;">
                        <a href="{{ route('admin.delCat', $cat->id ) }}"><i class="fas fa-trash-alt" style="color:red"></i></a>
                    </td>
                </tbody>
               
                @endforeach
            </table>
        </div>
        <form style="box-shadow: 0px 0px 2px 0.5px;height: 200px;border-radius:5px; padding:20px" action="" method="post" class="vstack form gap-2 col-md-3" enctype="multipart/form-data">
            <div class="title center mb-2">Ajouter une nouvelle Categorie</div>
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="name">Nom de la Categorie</label>
                @error('name')<label for="name">{{ $message }}</label>@enderror
                <input type="text" id="name" class="form-control" name="name">
            </div>
            
            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    </div>
@endsection