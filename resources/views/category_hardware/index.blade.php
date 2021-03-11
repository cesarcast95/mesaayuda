<!-- index.blade.php -->

@extends('home')
@section('title')
Categoria hardware
@endsection

@section('content')
<div class="uper">
    <div class="card">
        <div class="card-header">
            <b>Categoria de Hardware</b>
        </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
        <div class="card-body">
            <div><a href="{{ route('cat-hardware.create')}}" class="btn btn-primary el-align-right">Crear</a></div><br>
            <div class="table-responsive">
          <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                  <td><b>ID</b></td>
                  <td><b>Nombre</b></td>
                  <td><b>Descripcion</b></td>
                  <td colspan="2"><b>Action</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($cat_hardware as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->description}}</td>
                    <td><a href="{{ route('cat-hardware.edit',$cat->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('cat-hardware.destroy', $cat->id)}}" method="post">
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
</div>
@endsection
