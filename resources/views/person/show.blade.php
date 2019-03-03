@extends('layouts.app')

@section('title')
    Cadastro: {{ $person->name }} |
@stop

@section('content')
    <div class="container">
        <div class="row">
            <h1>Ver Cadastro - {{ $person->name }}</h1>
        </div>
        .<div class="row">
            <div class="col-sm-12">
                @php
                    $linkEdit = route('person.edit',['person' => $person->id]);
                    $linkDelete = route('person.destroy',['person' => $person->id]);
                @endphp

                {!! Button::warning(Icon::edit().' Editar')->asLinkTo($linkEdit) !!}
                {!!
                    Button::danger(Icon::trash().' Excluir')->asLinkTo($linkDelete)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"
                    ])
                !!}

                @php
                    $formDelete = FormBuilder::plain([
                        'id' => 'form-delete',
                        'url' => $linkDelete,
                        'method' => 'DELETE',
                        'style' => 'display:none'
                    ])
                @endphp

                {!! form($formDelete) !!}

                <br><br>

                <table class="table table-bordered" style="border-color: #000;">
                    <tbody style="border-color: #000;">
                    <tr style="border-color: #000;">
                        <th scope="row" width="30%">ID</th>
                        <td><small>{{ $person->id }}</small></td>
                    </tr>
                    <tr>
                        <th scope="row" width="30%">Nome</th>
                        <td><strong>{{ $person->name }}</strong></td>
                    </tr>
                    <tr>
                        <th scope="row" width="30%">Nascimento</th>
                        <td>{{ $person->birthday }}</td>
                    </tr>
                    <tr>
                        <th scope="row" width="30%">Sexo</th>
                        <td>{{ $person->genre }}</td>
                    </tr>
                    <tr>
                        <th scope="row" width="30%">Endereço</th>
                        <td>
                            CEP: {!! $person->postal_code !!} <br>
                            Rua: {!! $person->address !!}, Nº: {!! $person->number !!} <br>
                            Complemento: {!! $person->complement !!} <br>
                            Bairro: {!! $person->district !!}
                            Cidade: {!! $person->city !!} / {!! $person->state !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
