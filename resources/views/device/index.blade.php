<!-- index.blade.php -->
@extends('home')
@section('title')
Cargos
@endsection

@section('content')
<div class="uper">
    <div class="card">
        <div class="card-header">
            <b>Dispositivos</b>
        </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
        <div class="card-body">
            <div><a href="{{ route('device.create')}}" class="btn btn-primary el-align-right">Crear</a></div><br>
            <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                  <td><b>ID</b></td>
                  <td><b>Codigo</b></td>
                  <td><b>Nombre</b></td>
                  <td><b>Responsable</b></td>
                  <td><b>Dependencia</b></td>
                  <td><b>Estado</b></td>
                  <td colspan="2"><b>Acciones</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                <tr>
                    <td>{{$device->id}}</td>
                    <td>{{$device->code}}</td>
                    <td>{{$device->name}}</td>
                    <td>{{$device->personal_data->name}}</td>
                    <td>{{$device->dependence->name}}</td>
                    <td>{{$device->state_device->name}}</td>
                    <td><a href="{{ route('device.edit', $device->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('device.destroy', $device->id)}}" method="post">
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
        <div class="container row justify-content-center">
            <center><div class="col-lg-12 col-md-12 col-sm-12 col-xl-auto">
                    {{ $devices->links() }}
                </div></center>
        </div>
    </div>
<div>
@endsection
