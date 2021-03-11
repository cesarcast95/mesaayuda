<!-- index.blade.php -->

@extends('home')
@section('title')
Marcas
@endsection

@section('content')
<div class="uper">
    <div class="card">
        <div class="card-header">
            <b>Marcas</b>
        </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
        <div class="card-body">
            <div><a href="{{ route('brand.create')}}" class="btn btn-primary el-align-right">Crear</a></div><br>
       <div class="table-responsive">
          <table class="table table-hover">
            <thead>
                <tr>
                  <td><b>ID</b></td>
                  <td><b>Nombre</b></td>
                  <td colspan="2"><b>Acciones</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($brand as $bran)
                <tr>
                    <td>{{$bran->id}}</td>
                    <td>{{$bran->name}}</td>
                    <td><a href="{{ route('brand.edit',$bran->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('brand.destroy', $bran->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        </div>
    </div>
<div>
@endsection
