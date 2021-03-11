@extends("home")
@section("title")
    Permisos
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/permiso/crear.js")}}" type="text/javascript"></script>
@endsection

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="card uper">
    <div class="card-header">
      Crear Permisos
    </div>
<div class="card-body">
        @include('includes.mensaje')

                {{-- Contiene el botón --}}
                <div class="box">
                    <div class="box-tools pull-right">
                        <a href="{{route('permiso')}}" class="btn btn-block btn-info btn-sm">
                            <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                        </a>
                    </div>
                </div>
            <form action="{{route('guardar_permiso')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="box-body">
                    @include('admin.permiso.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @include('includes.boton-form-crear')
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection
