@extends("home")

@section('titulo')
    Sistema Menús
@endsection

{{-- para llamar la valiación por jquery --}}
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>

<div class="card uper">
    <div class="card-header">
        Editar Menús
    </div>
    <div class="card-body">
        {{-- Alerta de errores --}}
        @include('includes.form-error')
        @include('includes.mensaje')

                {{-- Contiene el botón --}}
                <div class="box">
                    <div class="box-tools pull-right">
                        <a href="{{route('menu')}}" class="btn btn-block btn-info btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                        </a>
                    </div>
                </div>
            <!-- /.box-header -->
            <form action="{{route('actualizar_menu', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf @method("put")

                    {{-- Contenido del formulario --}}
                    @include('admin.menu.form')

                <!-- /.box-body -->
                {{-- Botones --}}
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                    @include('includes.boton-form-editar')
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
</div>
</div>
@endsection
