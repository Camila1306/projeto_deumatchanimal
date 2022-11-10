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
            @if ((Auth::check()) && (Auth::user()->isAdmin()))
                <div class="col-4">
                    @if ($adotado->datavisita == null)    
                        {{Form::open(['route'=>['adotados.visitar', $adotado->id], 'method'=>'PUT'])}}
                        {{Form::submit('Visitar', ['class'=>'btn btn-outline-success', 'onclick'=>'return confim("Confirma visita?")'])}}
                        {{Form::close()}}
                    @endif
                </div>
            @endif    
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">
            <strong>Pet:</strong> {{$adotado->pet_id}} - {{$adotado->pet->nome}}<br>
            <strong>Adotante:</strong> {{$adotado->adotante_id}} - {{$adotado->adotante->nome}}<br>
            <strong>Data:</strong> {{\Carbon\Carbon::create($adotado->datahora)->format('d/mY H:i:s')}}<br>
            <strong>Obs:</strong> {{$adotado->obs}}<br>
            <strong>Data visita:</strong> {{!!$adotado->datavisita!!}}<br>

        </p>
    </div>
    <div class="card-footer">
        @if ((Auth::check()) && (Auth::user()->isAdmin()))
            {{Form::open(['route' => ['adotados.destroy', $adotado->id],'method' => 'DELETE'])}}
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
        @endif
            <a href="{{url('adotados/')}}" class="btn btn-outline-secondary">Voltar</a>
        @if ((Auth::check()) && (Auth::user()->isAdmin()))
            {{Form::close()}}
        @endif
    </div>
</div>
<br>

@endsection