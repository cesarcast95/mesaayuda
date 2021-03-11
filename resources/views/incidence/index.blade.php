<!-- index.blade.php -->
@extends('home')
@section('title')
Incidencias
@endsection

@section('content')
<div class="uper">
    <div class="card">
        <div class="card-header">
            <h1><b>Incidencias</b></h1>
        </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
        <div class="card-body">
            <div><a href="{{ route('incidence.create')}}" class="btn btn-primary el-align-right">Crear</a></div><br>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                  <td class="col-lg-12 col-md-12 col-sm-12 col-xl-auto"><b>Estado</b></td>
                  <td class="col-lg-12 col-md-12 col-sm-12 col-xl-auto"><b>Reportado por</b></td>
                  <td class="col-lg-12 col-md-12 col-sm-12 col-xl-auto"><b>Dispositivo</b></td>
                  <td class="col-lg-12 col-md-12 col-sm-12 col-xl-auto"><b>Asignado a</b></td>
                  <td class="col-lg-12 col-md-12 col-sm-12 col-xl-auto"><b>Dependencia</b></td>
                  <td class="col-lg-12 col-md-12 col-sm-12 col-xl-auto" colspan="2"><b>Acciones</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($incidences as $incidence)
                <tr>
                    <td><b>{{$incidence->state->name}}</b></td>
                    <td>{{$incidence->user->name}}</td>
                    <td>{{$incidence->device->name}}</td>
                    <td>{{$incidence->functionary->name}}</td>
                    <td>{{$incidence->functionary->position->dependence->name}}</td>
                    @if ($incidence->state->id === 1 or $incidence->state->id === 2)
                        <td><a href="{{ route('incidence.show', $incidence->id)}}" class="btn btn-warning"><b>Ver</b></a></td>
                        <td><a href="{{ route('incidence.edit', $incidence->id)}}" class="btn btn-primary"><b>Asignar</b></a></td>
                        <td><a href="{{ route('incidence.attend', $incidence->id)}}" class="btn btn-success"><b>Atender</b></a></td>
                    @else
                        <td><a href="{{ route('incidence.show', $incidence->id)}}" class="btn btn-warning"><b>Ver</b></a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
          </table>
            </div>

        </div>
    </div>
    <div class="container row justify-content-center">
        <center><div class="col-lg-12 col-md-12 col-sm-12 col-xl-auto">
            {{ $incidences->links() }}
        </div></center>
    </div>
<div>
@endsection
