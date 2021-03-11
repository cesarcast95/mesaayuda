@extends('home')

@section('titulo')
    Sistema Menús
@endsection

{{-- para llamar la valiación por jquery --}}
@section('scripts')
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
      Crear Menús
    </div>
    <div class="card-body">
        @include('includes.form-error')
        @include('includes.mensaje')
            <form action="{{route('guardar_menu')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf

            {{-- Contenido del formulario --}}
              @include('admin.menu.form')
               {{-- Botones --}}
               <div class="box-footer">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                   @include('includes.boton-form-crear')
                </div>
            </form>
         </div>
    </div>
</div>
@endsection
