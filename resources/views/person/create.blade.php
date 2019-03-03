@extends('layouts.app')

@section('title')
    Novo Cadastro |
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Novo Cadastro</h1>
            </div>
        </div>
        @include('person.partial._form')
        {{--<div class="row">
            <div class="col-sm-8">
                {!! form($form) !!}
            </div>
        </div>--}}
    </div>
@stop
