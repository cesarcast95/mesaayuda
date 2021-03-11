<!-- create.blade.php -->

@extends('home')

@section('title')
    Crear
@endsection

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Registrar Marca
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
      <form method="POST" action="{{ route('brand.store') }}" autocomplete="off">
          <div class="form-group">
              @csrf
              <label for="name">Nombre :</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
          </div>
          <button type="reset" class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Marca</button>
      </form>
  </div>
  <a href="{{ route('position.index')}}" class="btn btn-primary">Inicio</a>
</div>
@endsection
