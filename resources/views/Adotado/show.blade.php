@extends('layouts.app')
@section('title', 'Adotado - {{$adotado->id}}')
@section('content')
<div class="card w-50">
    <div class="card-header">
        <h1>Adotado - {{$adotado->id}}</h1>
    </div>
    <div class="card-body">
        <p class="card-text">
            <strong>Pet:</strong> {{$adotado->pet_id}} - {{$adotado->pet->nome}}<br>
            <strong>Adotante:</strong> {{$adotado->adotante_id}} - {{$adotado->adotante->nome}}<br>
            <strong>Data:</strong> {{\Carbon\Carbon::create($adotado->datahora)->format('d/mY H:i:s')}}<br>
            <strong>Obs:</strong> {{$adotado->obs}}<br>
            <strong>Data 1º visita:</strong> {{!!$adotado->data_visita_um!!}}<br>
            <strong>Data 2º visita:</strong> {{!!$adotado->data_visita_dois!!}}<br>
            <strong>Data 3º visita:</strong> {{!!$adotado->data_visita_tres!!}}<br>
        </p>
    </div>
    <div class="card-footer">
            {{Form::open(['route' => ['adotados.destroy', $adotado->id],'method' => 'DELETE'])}}
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
            <a href="{{url('adotados/')}}" class="btn btn-outline-secondary">Voltar</a>
            {{Form::close()}}
    </div>
</div>
<br>

@endsection