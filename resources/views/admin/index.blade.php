@extends('admin.template.main')

@section('titulo','Admin ')

@section('contenido')
@include('admin.template.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection