<!-- index.blade.php -->

@extends('home')
@section('title')
Datos personales
@endsection

@section('content')
<div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
</div>

<div class="card text-center">
  <div class="card-header">
      <h3><b>Información personal</b></h3>
  </div>
    <div class="card-body">
      <?php
        $pd=new App\Models\PersonalData();
      ?>
      @foreach($personaldata as $pd)
            <h5 class="card-title">Nombre: {{$pd->name}} {{$pd->last_name}}</h5>
            <p class="card-text">Cargo: {{$pd->position->name}}, de la dependencia: {{$pd->position->dependence->name}}</p>
            <a href="{{ route('personal-data.edit', $pd->id)}}" class="btn btn-primary">Editar información</a>
      @endforeach
      @if($pd->user_id == null)
              <a href="{{ route('personal-data.create')}}" class="btn btn-primary el-align-right">Ingresa tu información personal</a>
      @endif
    </div>
   </div>
        <br>
<div class="form-group"><h1><b>Dispositivos a cargo</b></h1></div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                    <tr>
                        <th>Codigo</th>
                        <th>Direccion IP</th>
                        <th>Dependencia</th>
                        <th>Dispositivo</th>
                        <th>Estado</th>
                    </tr>
            </thead>
                    <tbody>
                    @foreach($devices as $device)
                        <tr>
                            <td>{{$device->code}}</td>
                            <td>{{$device->personal_id}}
                            <td>{{$device->dependence->name}}</td>
                            <td>{{$device->name}}</td>
                            <td>{{$device->state_device->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
