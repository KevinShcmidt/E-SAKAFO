@extends('../admin/layout')
@section('content')
    <div class="container my-5">
        @if(session('success'))

            <P class="alert alert-success">
                {{  session('success') }}
            </P>

        @endif
        
        <form style="box-shadow: 0px 0px 2px 0.5px;border-radius:5px; padding:20px" action="" method="post" class="vstack form gap-2 col-md-6" enctype="multipart/form-data">
            <div class="title center mb-2">Mettre à jour le Menu</div>
            @csrf
            @method("PATCH")
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
            <button class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
    </div>
@endsection