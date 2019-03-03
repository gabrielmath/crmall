@extends('layouts.app')

@section('title')
    Editar Cadastro |
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Editar Cadastro</h1>
            </div>
        </div>
        @include('person.partial._form')
    </div>
@stop
