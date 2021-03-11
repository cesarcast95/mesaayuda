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
    Ingresar datos personales
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
      <form method="POST" action="{{ route('personal-data.store') }}" autocomplete="off">
          <div class="form-group">
              @csrf
              <label for="name">Nombre :</label>
              <input type="text" class="form-control" name="name" required/>

              <label for="last_name">Apellido :</label>
              <input type="text" class="form-control" name="last_name" required/>

              <input type="text" class="form-control" hidden name="user_id" value="{{Auth::user()->id}}" required/>
              
          </div>

          <div class="form-group">
                <label for="position_id">Cargo</label>
                <select name="position_id" class="form-control" id="position_id">
                    <option selected value="">Selecionar cargo</option>
                    @foreach ($position as $pos)
                        <option value="{{$pos->id}}">
                            {{$pos->name}} - {{$pos->contact.' Dependencia de: '.$pos->dependence->name}}
                        </option>
                    @endforeach               
                </select>
            </div>

          
          <button type="reset" class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-primary">Generar datos personales</button>
      </form>
  </div>
  <a href="{{ route('personal-data.index')}}" class="btn btn-primary">Inicio</a>
</div>
@endsection
