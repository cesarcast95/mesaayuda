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
  .invisible {
      visibility: hidden;
  }
</style>
<div class="card uper">
  <div class="card-header">
      <h2>Registrar Incidencia</h2>
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
      <form method="POST" action="{{ route('incidence.store') }}" autocomplete="off" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="description"><b>Descripcion</b></label>
              <textarea class="form-control" rows="5" id="description" name="description">{{old('description')}}</textarea>
          </div>
          <div class="form-group">
              <label for="device_id"><b>Dispositivo</b></label>
              <select name="device_id" class="form-control" id="device_id">
                  <option selected value="{{old('device_id')}}">Selecionar Dispositivo</option>
                  @foreach ($devices as $dev)
                      <option value="{{$dev->id}}">
                          {{$dev->name}}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="evidence">Evidencia</label>
              <input type="file" class="form-control-file" id="evidence" name="evidence">
          </div>
          <div hidden class="form-group"><input type="text" class="form-control" name="state_id" value="1"/></div>
          <div hidden class="form-group"><input type="text" class="form-control" name="score" value="1"/></div>
          <div hidden class="form-group"><input type="text" class="form-control" name="diagnostic" value="Sin atender"/></div>
          <div hidden class="form-group"><input type="text" class="form-control" name="functionary_id" value="1"/></div>
          <div hidden class="form-group"><input type="text" class="form-control" name="usuario_id" value="{{ Auth::user()->id }}"/></div>
          <button type="reset" class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Incidencia</button>
      </form>
  </div>
  <a href="{{ route('incidence.index')}}" class="btn btn-primary">Inicio</a>
</div>
@endsection
