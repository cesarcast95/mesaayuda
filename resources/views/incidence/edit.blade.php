<!-- edit.blade.php -->

@extends('home')

@section('content')
<div class="card uper">
  <div class="card-header">
    Asignar incidencia
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
      <form method="post" action="{{ route('incidence.update', $incidence->id) }}">
          <div class="form-group ">
              @csrf
              @method('PATCH')
              <label for="functionary_id">Asignar a:</label>
              <select name="functionary_id" class="form-control" id="functionary_id" >
                  <!--Si la categoría que esta seleccionando es igual a la del artículo se selecciona, de lo contrario la muestra pero no se seleccina-->
                  @foreach ($functionary as $funct)
                      @if ($funct->id==$incidence->functionary_id)
                          <option value="{{$funct->id}}" selected >{{$funct->name}}</option>
                      @else
                          <option value="{{$funct->id}}">{{$funct->name}}</option>
                      @endif
                  @endforeach
              </select>
          </div>
          <div hidden class="form-group"><input type="text" class="form-control" name="state_id" value="2"/></div>
          <div hidden class="form-group"><input type="text" class="form-control" name="usuario_id" value="{{ Auth::user()->id }}"/></div>
          <button type="submit" class="btn btn-primary">Asignar incidencia</button>
      </form>
  </div>
    </div>
</div>
@endsection
