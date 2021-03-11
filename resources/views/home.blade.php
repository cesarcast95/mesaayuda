@extends('layouts.app')


<style>
    .uper {
        margin-top: 40px;
    }
</style>

@section('content')
@include('includes.mensaje')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Panel de control</b></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center><h1><b>ESTAMOS EN DESARROLLO</b></h1></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
