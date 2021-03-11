<!-- edit.blade.php -->

@extends('home')

@section('content')
<div class="card uper">
  <div class="card-header">
      <b>Incidencia</b>
</div>
  <div class="card-body">
          <div class="form-group ">
              <label for="device_id"><b>Dispositivo</b></label>
              <input type="text" class="form-control" id="device_id" name="device_id" value="{{$incidence->device->name}}" disabled >
          </div>
          <div class="form-group">
              <label for="code"><b>Codigo del dispositivo</b></label>
              <input type="text" class="form-control" id="code" name="code" value="{{$incidence->device->code}}" disabled >
          </div>
        <div class="form-group">
          <label for="usuario_id"><b>Reportado por: </b></label>
          <input type="text" class="form-control" id="usuario_id" name="usuario_id" value="{{$incidence->user->name}}" disabled>
        </div>
        <div class="form-group">
             <label for="dependence"><b>Dependencia</b></label>
             <input type="text" class="form-control" id="dependence" name="dependence" value="{{$incidence->device->dependence->name}}" disabled>
        </div>
          <div class="form-group">
              <label for="description"><b>Descripcion</b></label>
              <textarea type="text" class="form-control" id="description" name="description" disabled >{{$incidence->description}}</textarea>
          </div>

          <div class="text-center"><label for="evidence"><b>Evidencia</b></label></div>
          <div class="text-center">
              <img src="{{ asset("uploads/$incidence->evidence") }}" class="img-fluid" style="width:250px; height:250px;">
          </div>
          <br>
          <div class="form-group">
              <label for="diagnostic"><b>Diagnostico</b></label>
              <textarea type="text" class="form-control" id="diagnostic" name="diagnostic" disabled >{{$incidence->diagnostic}}</textarea>
          </div>
          <div hidden class="form-group"><input type="text" class="form-control" name="state_id" value="3"/></div>
          <div hidden class="form-group"><input type="text" class="form-control" name="functionary_id" value="{{ Auth::user()->id }}"/></div>
      <div class="row justify-content-center">
          <div class="col-md-4 col-lg-2">
              <a href="{{ route('personal-data.index')}}" class="btn btn-primary btn-block"><b>Regresar</b></a>
          </div>
          @if ($incidence->state_id === 3)
              <div class="col-md-4 col-lg-2">
                 {{--  <!-- <a href="{{ route('pdf.generate', ['id' => $incidence->id])}}" class="btn btn-success btn-block"><b>Generar PDF</b></a> --> --}}
                      <a href="#" class="btn btn-success btn-block"><b>Generar PDF</b></a>
              </div>
          @endif
      </div>
  </div>
    </div>
</div>
@endsection
