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
      <form method="post" action="{{ route('device.update', $device->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="code">Codigo :</label>
              <input type="text" class="form-control" name="code" value="{{$device->code}}"/>
          </div>
          <div class="form-group">
              <label for="name">Dispositivo :</label>
              <input type="text" class="form-control" name="name" value="{{$device->name}}"/>
          </div>
          <div class="form-group ">
                  <label for="os_id">Sistema operativo</label>
                  <select name="os_id" class="form-control" id="os_id" >
                      <!--Si la categoría que esta seleccionando es igual a la del artículo se selecciona, de lo contrario la muestra pero no se seleccina-->
                      @foreach ($os as $os_s)
                          @if ($os_s->id==$device->os_id)
                              <option value="{{$os_s->id}}" selected >{{$os_s->name}}</option>
                          @else
                              <option value="{{$os_s->id}}">{{$os_s->name}}</option>
                          @endif
                      @endforeach
                  </select>
              </div>
          <div class="form-group">
              <label for="ip">Direccion IP :</label>
              <input type="text" class="form-control" value="{{$device->ip}}" name="ip"/>
          </div>
          <div class="form-group">
              <label for="mac">Direccion MAC :</label>
              <input type="text" class="form-control" name="mac" value="{{$device->mac}}"/>
          </div>
          <div class="form-group">
              <label for="serie"><b>Serie</b></label>
              <input type="text" class="form-control" value="{{$device->serie}}" name="serie"/>
          </div>
          <div class="form-group">
              <label for="licencia"><b>Licencia</b></label>
              <input type="text" class="form-control" name="licencia" value="{{$device->licencia}}"/>
          </div>
          <div class="form-group">
              <label for="brand_id"><b>Marca</b></label>
              <select name="brand_id" class="form-control" id="brand_id">
                  @foreach ($brand as $bran)
                      @if ($bran->id==$device->brand_id)
                          <option value="{{$bran->id}}" selected >{{$bran->name}}</option>
                      @else
                          <option value="{{$bran->id}}">{{$bran->name}}</option>
                      @endif
                  @endforeach
              </select>
          </div>
              <div class="form-group ">
                <label for="categoryHW_id">Categoría</label>
                <select name="categoryHW_id" class="form-control">
                  <!--Si la categoría que esta seleccionando es igual a la del artículo se selecciona, de lo contrario la muestra pero no se seleccina-->
                  @foreach ($category as $cat)
                    @if ($cat->id==$device->categoryHW_id)
                    <option value="{{$cat->id}}" selected >{{$cat->name}}</option>
                    @else
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>


          <div class="form-group">
              <label for="personal_id"><b>Asigando a:</b></label>
              <select name="personal_id" class="form-control" id="personal_id">
                  @foreach ($personal as $per)
                      @if ($per->id==$device->personal_id)
                          <option value="{{$per->id}}" selected >{{$per->name}}</option>
                      @else
                          <option value="{{$per->id}}">{{$per->name}}</option>
                      @endif
                  @endforeach
              </select>
          </div>


          <div class="form-group">
              <label for="dependence_id">Dependencia</label>
              <select name="dependence_id" class="form-control" id="dependence_id">
                  @foreach ($dependence as $pos)
                      @if($pos->id == $device->dependence_id)
                          <option selected value="{{$pos->id}}">{{$pos->name}}</option>
                      @else
                          <option value="{{$pos->id}}">{{$pos->name}}</option>
                      @endif
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="state_device_id">Estado</label>
              <select name="state_device_id" class="form-control" id="state_device_id">
                  @foreach ($state_device as $est)
                      @if($est->id == $device->state_device_id)
                          <option selected value="{{$est->id}}">{{$est->name}}</option>
                      @else
                          <option value="{{$est->id}}">{{$est->name}}</option>
                      @endif
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar dispositivo</button>
      </form>
  </div>
    </div>
</div>
@endsection
