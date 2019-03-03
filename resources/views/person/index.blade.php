@extends('layouts.app')

@section('title')
    Listagem de Cadastros |
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Listagem de Cadastros</h1>
                <br>
                {!! Button::success(Icon::create('plus').' Nova Cadastro')->asLinkTo(route('person.create')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <br>
                <br>
                @include('layouts._messages')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {!!
                    Table::withContents($people->items())
                    ->striped()
                    ->callback('Ações', function($field,$model){
                        $linkEdit = route('person.edit', ['person' => $model->id]);
                        $linkShow = route('person.show', ['person' => $model->id]);
                        return Button::warning(Icon::create('edit').' Editar')->asLinkTo($linkEdit).' '.
                                Button::primary(Icon::create('eye-open').' Ver')->asLinkTo($linkShow);
                    })
                !!}

                {!! $people->links() !!}
            </div>
        </div>
    </div>
@stop
