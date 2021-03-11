@extends("home")
@section("titulo")
Menú
@endsection

@section("styles")
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="card uper">
    <div class="card-header">
      Lista de Menús
    </div>
    <div class="card-body">
        @include('includes.mensaje')
        <div class="box box-success">
                <a href="{{route('crear_menu')}}" class="btn btn-success btn-sm pull-right">Crear menú</a>
        </div>
            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            @if ($item["menu_id"] != 0)
                                @break
                            @endif
                            @include("admin.menu.menu-item",["item" => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
