@extends('layouts.app')
@section('title', 'Adotado - {{$adotado->id}}')
@section('content')
<div class="card w-50">
    <div class="card-header">
        <h1>Adotado - {{$adotado->id}}</h1>
    </div><div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <h3 class="card-title">ID: {{$adotado->id}}</h3> <br>
            </div>
                <div class="col-4">
                    @if ($adotado->data_visita_um == null)    
                        {{Form::open(['route'=>['adotados.visitarum', $adotado->id], 'method'=>'PUT'])}}
                        {{Form::submit('Visitar', ['class'=>'btn btn-outline-success', 'onclick'=>'return confim("Confirma visita?")'])}}
                        {{Form::close()}}
                    @endif
                </div>
                <div class="col-4">
                    @if ($adotado->data_visita_dois == null)    
                        {{Form::open(['route'=>['adotados.visitardois', $adotado->id], 'method'=>'PUT'])}}
                        {{Form::submit('Visitar', ['class'=>'btn btn-outline-success', 'onclick'=>'return confim("Confirma visita?")'])}}
                        {{Form::close()}}
                    @endif
                </div>
                <div class="col-4">
                    @if ($adotado->data_visita_tres == null)    
                        {{Form::open(['route'=>['adotados.visitartres', $adotado->id], 'method'=>'PUT'])}}
                        {{Form::submit('Visitar', ['class'=>'btn btn-outline-success', 'onclick'=>'return confim("Confirma visita?")'])}}
                        {{Form::close()}}
                    @endif
                </div>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">
            <strong>Pet:</strong> {{$adotado->pet_id}} - {{$adotado->pet->nome}}<br>
            <strong>Adotante:</strong> {{$adotado->adotante_id}} - {{$adotado->adotante->nome}}<br>
            <strong>Data:</strong> {{\Carbon\Carbon::create($adotado->datahora)->format('d/mY H:i:s')}}<br>
            <strong>Obs:</strong> {{$adotado->obs}}<br>
            <strong>Data 1º visita:</strong> {{!!$adotado->visitaum!!}}<br>
            <strong>Data 2º visita:</strong> {{!!$adotado->visitadois!!}}<br>
            <strong>Data 3º visita:</strong> {{!!$adotado->visitatres!!}}<br>
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