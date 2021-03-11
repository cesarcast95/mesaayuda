<!-- index.blade.php -->

@extends('home')
@section('title')
Listado
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
<div class="uper">
    <div class="card">
        <div class="card-header">
            <b>Dependencias</b>
        </div>

        <div class="card-body">
                @include('includes.mensaje')

            <div><a href="{{ route('dependence.create')}}" class="btn btn-primary el-align-right">Crear</a></div><br>
            <div class="table-responsive">
                {{-- El id  id="tabla-data" es necesario para el diálogo eliminar--}}
  <table class="table table-striped" id="tabla-data">
    <thead>
        <tr>
          <td><b>ID</b></td>
          <td><b>Nombre</b></td>

          <td><b>Rango IP</b></td>
          <td><b>Descripcion</b></td>
          <td colspan="2"><b>Action</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($dependences as $position)
        <tr>
            <td>{{$position->id}}</td>
            <td>{{$position->name}}</td>
            <td>{{$position->ip1}} - {{$position->ip2}}</td>
            <td>{{$position->description}}</td>
            <td>
                    <a href="{{route("dependence.edit", ['id' => $position->id ])}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{route("eliminar_dependencia",  ['id' => $position->id])}}" class="d-inline form-eliminar" method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger eliminar tooltipsC" title="Eliminar este registro">
                            Eliminar
                        </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
        </div>
        </div>
    </div>
</div>
@endsection
