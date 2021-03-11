<!-- index.blade.php -->

@extends('home')
@section('title')
Cargos
@endsection

@section('content')
<div class="uper">
    <div class="card">
        <div class="card-header">
            <b>Cargos</b>
        </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
        <div class="card-body">
            <div><a href="{{ route('position.create')}}" class="btn btn-primary el-align-right">Crear</a></div><br>
            <div class="table-responsive">
          <table class="table table-hover">
            <thead>
                <tr>
                  <td><b>ID</b></td>
                  <td><b>Dependencia</b></td>
                  <td><b>Cargo</b></td>
                  <td><b>Descripcion</b></td>
                  <td colspan="2"><b>Acciones</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($position as $pos)
                <tr>
                    <td>{{$pos->id}}</td>
                    <td>{{$pos->dependence->name}}</td>
                    <td>{{$pos->name}}</td>
                    <td>{{$pos->description}}</td>
                    <td><a href="{{ route('position.edit',$pos->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('position.destroy', $pos->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        </div>
    </div>
<div>
@endsection
