<!-- edit.blade.php -->

@extends('home')

@section('content')
<div class="card uper">
  <div class="card-header">
    Editar Información Personal
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
      <form method="post" action="{{ route('personal-data.update', $personaldata->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{$personaldata->name}}"/>

              <label for="name">Apellido</label>
              <input type="text" class="form-control" name="last_name" value="{{$personaldata->last_name}}"/>
              
              <input type="text" class="form-control" hidden name="user_id" value="{{Auth::user()->id}}" required/>
            </div>  
              <div class="form-group ">
              <label for="name">Cargo</label>
              <select name="position_id" class="form-control">
                <!--Si la categoría que esta seleccionando es igual a la del artículo se selecciona, de lo contrario la muestra pero no se seleccina-->
                @foreach ($position as $pos)
                  @if ($pos->id==$personaldata->position_id)
                  <option value="{{$pos->id}}" selected >
                    {{$pos->name}}
                </option>
                  @else
                  <option value="{{$pos->id}}">
                    {{$pos->name}} 
                </option>
                  @endif
                @endforeach
              </select>
               
         </div> 

          <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
@endsection
