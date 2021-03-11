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
    Registrar Cargo
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
      <form method="POST" action="{{ route('position.store') }}" autocomplete="off">
          <div class="form-group">
              @csrf
              <label for="name">Nombre :</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
          </div>
          <div class="form-group">
              <label for="dependence_id">Dependencia</label>
              <select name="dependence_id" class="form-control" id="dependence_id">
                  <option selected value="">Selecionar dependencia</option>
                  @foreach ($dependence as $dep)
                      <option value="{{$dep->id}}">
                          {{$dep->name}}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="description">Descripcion</label>
            <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
          </div>
          <button type="reset" class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear cargo</button>
      </form>
  </div>
  <a href="{{ route('position.index')}}" class="btn btn-primary">Inicio</a>
</div>
@endsection
