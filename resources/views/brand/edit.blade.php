<!-- edit.blade.php -->

@extends('home')

@section('content')
<div class="card uper">
  <div class="card-header">
    Editar Marca
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('brand.update', $brand->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{$brand->name}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Marca</button>
      </form>
  </div>
</div>
@endsection
