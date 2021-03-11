<!-- edit.blade.php -->

@extends('home')

@section('content')
<div class="card uper">
  <div class="card-header">
    Editar Dependencia
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
      <form method="post" action="{{ route('cat-hardware.update', $cat_hardware->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Dispositivo</label>
              <input type="text" class="form-control" name="name" value="{{$cat_hardware->name}}"/>
          </div>
          <div class="form-group">
                <label for="description">Descripcion:</label>
          <textarea class="form-control" rows="5" id="description" name="description" required>{{$cat_hardware->description}}</textarea>
            </div>
          <button type="submit" class="btn btn-primary">Actualizar dependencia</button>
      </form>
  </div>
</div>
@endsection
