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
      <h2>Registrar dispositivo</h2>
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
      <form method="POST" action="{{ route('device.store') }}" autocomplete="off">
          <div class="form-group">
              @csrf
              <label for="code"><b>Codigo</b></label>
              <input type="text" class="form-control" name="code" value="{{old('code')}}"/>
          </div>
          <div class="form-group">
                <label for="name"><b>Dispositivo</b></label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
            </div>
          <div class="form-group">
              <label for="categoryHW_id"><b>Categoria</b></label>
              <select name="categoryHW_id" class="form-control" id="categoryHW_id">
                  <option selected value="">Selecionar categoria</option>
                  @foreach ($cat_hardware as $cat)
                      <option value="{{$cat->id}}">
                          {{$cat->name}}
                      </option>
                  @endforeach
              </select>
          </div>
          {{-- Pregunta 1 --}}
          <div class="form-group">
                <label><b>Si el dispositivo no cuenta con un sistema operativo deseleccionar la casilla.</b></label>
                <br>
                  <input type="checkbox"  id="pregunta1" checked>
            </div>
            {{-- Sistema Operativo --}}
          <div class="form-group" id="os_id">
              <label for="os_id" ><b>Sistema operativo: </b></label>
              <select name="os_id" class="form-control" >
                    <option selected value="1">Selecionar sistema operativo</option>
                  @foreach ($os as $os_s)
                      <option value="{{$os_s->id}}">
                          {{$os_s->name}}
                      </option>
                  @endforeach
              </select>

                <label for="licencia"><b>Licencia</b></label>
                <input type="text" class="form-control" placeholder="Agregar licencia del sistema operativo..." name="licencia" value="N/A"/>
          </div>
          {{-- Pregunta 2 --}}
          <div class="form-group">
                <label><b>Si el dispositivo no cuenta con una dirección IP deseleccionar la casilla.</b></label>
                <br>
                  <input type="checkbox"  id="pregunta2" checked>
            </div>
            {{-- IP --}}
          <div class="form-group" id="ip_id">
              <label for="ip"><b>Direccion IP :</b></label>
              <input type="text" class="form-control" value="{{$clienteIP}}" name="ip"/>

              <label for="mac"><b>Direccion MAC :</b></label>
              <input type="text" class="form-control" name="mac" value="N/A"/>
            </div>
          <div class="form-group">
              <label for="serie"><b>Serie</b></label>
              <input type="text" class="form-control" value="{{old('serie')}}" name="serie"/>
          </div>

          <div class="form-group">
              <label for="brand_id"><b>Marca</b></label>
              <select name="brand_id" class="form-control" id="brand_id">
                  <option selected value="">Selecionar marca</option>
                  @foreach ($brand as $bran)
                      <option value="{{$bran->id}}">
                          {{$bran->name}}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="state_device_id"><b>Estado</b></label>
              <select name="state_device_id" class="form-control" id="state_device_id">
                  <option selected value="">Selecionar estado</option>
                  @foreach ($state_device as $state_d)
                      <option value="{{$state_d->id}}">
                          {{$state_d->name}}
                      </option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="personal_id"><b>Asignado a:</b></label>
              <select name="personal_id" class="form-control" id="personal_id">
                  <option selected value="">Selecionar</option>
                  @foreach ($personal as $person)
                      <option value="{{$person->id}}">
                          {{$person->name}}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="dependence_id"><b>Dependencia</b></label>
              <select name="dependence_id" class="form-control" id="dependence_id">
                  <option selected value="">Selecionar dependencia</option>
                  @foreach ($dependence as $dep)
                      <option value="{{$dep->id}}">
                          {{$dep->name}}
                      </option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="observaciones"><b>Observaciones</b></label>
              <textarea class="form-control" rows="5" id="observaciones" name="observaciones"></textarea>
          </div>
          <button type="reset" class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Dipositivo</button>
      </form>
  </div>
  <a href="{{ route('device.index')}}" class="btn btn-primary">Inicio</a>
</div>
@endsection

{{-- Luego instanciar el script desde un js --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#pregunta1').on('change',function(){
        if (this.checked) {
         $("#os_id").show();
        } else {
         $("#os_id").hide();
        }
      })
    });
    $(document).ready(function(){
      $('#pregunta2').on('change',function(){
        if (this.checked) {
         $("#ip_id").show();
        } else {
         $("#ip_id").hide();
        }
      })
    });
</script>
