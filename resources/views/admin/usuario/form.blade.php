<div class="form-group">
    <label for="name" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="name" id="name" class="form-control" value="{{old('name', $data->name ?? '')}}" required/>
    </div>
</div>
 <div class="form-group">
        <label for="email" class="col-lg-3 control-label requerido">E-mail</label>
        <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required/>
        </div>
</div>
<div class="form-group">
        <label for="password" class="col-lg-3 control-label {{!isset($data) ? 'requerido' : ''}}">Contraseña</label>
        <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" value="" {{!isset($data) ?  'required' : ''}} minlength="8"/>
        </div>
</div>
<div class="form-group">
        <label for="re_password" class="col-lg-3 control-label {{!isset($data) ? 'requerido' : ''}}">Repita Contraeña</label>
        <div class="col-lg-8">
        <input type="password" name="re_password" id="re_password" class="form-control" value="" {{!isset($data) ? 'required' : ''}} minlength="8"/>
        </div>
</div>
<div class="form-group">
        <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
        <div class="col-lg-8">
        <select name="rol_id[]" id="rol_id" class="form-control selectpicker" multiple required>
            <option value="">Seleccione el rol</option>
            @foreach ($rols as $id => $nombre)
                <option 
                value="{{$id}}"
                 {{is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected': '') :
                 (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '')
                 }}>
                 {{$nombre}}</option>
            @endforeach
        </select>
        </div>
</div>
