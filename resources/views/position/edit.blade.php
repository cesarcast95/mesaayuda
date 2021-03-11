<!-- edit.blade.php -->

@extends('home')

@section('content')
<div class="card uper">
  <div class="card-header">
    Editar Cargo
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
      <form method="post" action="{{ route('position.update', $position->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{$position->name}}"/>
          </div>
          <div class="form-group">
              <label for="dependence_id">Dependencia</label>
              <select name="dependence_id" class="form-control" id="dependence_id">
                  @foreach ($dependence as $pos)
                      @if($pos->id == $position->dependence_id)
                          <option selected value="{{$pos->id}}">{{$pos->name}}</option>
                      @else
                          <option value="{{$pos->id}}">{{$pos->name}}</option>
                      @endif
                  @endforeach
              </select>
          </div>
          <div class="form-group">
                <label for="comment">Descripcion</label>
                <textarea class="form-control" rows="5" id="description" name="description">{{$position->description}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Cargo</button>
      </form>
  </div>
</div>
@endsection
