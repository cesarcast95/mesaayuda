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
    Registrar Dependencia
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
      <form method="POST" action="{{ route('dependence.store') }}" autocomplete="off">
          <div class="form-group">
              @csrf
              <label for="name">Nombre :</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
          </div>
          <div class="form-group">
              <label for="ip1">IP inicial :</label>
              <input type="text" class="form-control" name="ip1" value="{{old('ip1')}}"/>
              <label for="ip2">IP final :</label>
              <input type="text" class="form-control" name="ip2" value="{{old('ip2')}}"/>
          </div>
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
          </div>
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Crear Dependencia</button>
      </form>
  </div>
  <a href="{{ route('position.index')}}" class="btn btn-primary">Inicio</a>
</div>
@endsection
