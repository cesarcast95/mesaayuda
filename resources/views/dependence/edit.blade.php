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
      <form method="post" action="{{ route('dependence.update', $dependence->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" value="{{$dependence->name}}"/>
          </div>
          <div class="form-group">
              <label for="ip1">IP inicial :</label>
              <input type="text" class="form-control" name="ip1" value="{{$dependence->ip1}}"/>
              <label for="ip2">IP final :</label>
              <input type="text" class="form-control" name="ip2" value="{{$dependence->ip2}}"/>
          </div>
          <div class="form-group">
                <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment" name="description" required>{{$dependence->description}}</textarea>
            </div>
          <button type="submit" class="btn btn-primary">Actualizar dependencia</button>
      </form>
  </div>
</div>
@endsection
