@extends('layouts.app')
@section('title', 'Listagem de adotantes')
@section('content')
<h1>Listagem de adotantes</h1>
@if(Session::has('mensagem'))
<div class="alert alert-success">
    {{Session::get('mensagem')}}
</div>
@endif
<br>

{{Form::open(['url'=>'adotantes/buscar', 'method'=>'GET'])}}
<div class="row">

    <div class="col-sm-3">
        <a class="btn btn-outline-success" href="{{url('adotantes/create')}}">Adicionar</a>
    </div>
    <div class="col-sm-9">
        <div class="input-group m1-5">
            @if($busca !== null)
            &nbsp;<a class="btn btn-outline-secondary" href="{{url('adotantes/')}}">Todos</a>&nbsp;
            @endif
            {{Form::text('busca', $busca, ['class'=>'from-control', 'required', 'placeholder'=>'buscar'])}}
            &nbsp;
            <span class="input-group-btn">
                {{Form::submit('Buscar', ['class'=>'btn btn-outline-primary'])}}
            </span>
        </div>
    </div>
</div>
{{Form::close()}}
<br><br>
<div class="card-group">
    @foreach ($adotantes as $adotante)
    <div class="card mb-3" style="max-width: 540px;">
        @php
        $nomeimagem = "";
        if(file_exists("./img/adotantes/".md5($adotante->id).".jpg")){
        $nomeimagem = "./img/adotantes/".md5($adotante->id).".jpg";
        } elseif(file_exists("./img/adotantes/".md5($adotante->id).".png")){
        $nomeimagem = "./img/adotantes/".md5($adotante->id).".png";
        } elseif(file_exists("./img/adotantes/".md5($adotante->id).".gif")){
        $nomeimagem = "./img/adotantes/".md5($adotante->id).".gif";
        } elseif(file_exists("./img/adotantes/".md5($adotante->id).".webp")){
        $nomeimagem = "./img/adotantes/".md5($adotante->id).".webp";
        } elseif(file_exists("./img/adotantes/".md5($adotante->id).".jpeg")){
        $nomeimagem = "./img/adotantes/".md5($adotante->id).".jpeg";
        } elseif(file_exists("./img/adotantes/".md5($adotante->id).".jfif")){
        $nomeimagem = "./img/adotantes/".md5($adotante->id).".jfif";
        } else {
        $nomeimagem = "./img/adotantes/semfoto.jpg";
        }
        @endphp
        {{Html::image(asset($nomeimagem), 'Foto de '.$adotante->nome,)}}
        <div class="card-body">
            <h5 class="card-title"><a href="{{url('adotantes/'.$adotante->id)}}"> {{$adotante->nome}}</a></h5>
            <p class="card-text">{{$adotante->planejamento}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Cidade: </strong> {{$adotante->cidade}}</li>
            <li class="list-group-item"> <strong>Telefone:</strong> {{$adotante->telefone}}</li>
            <li class="list-group-item"><strong>Email:</strong> {{$adotante->email}}</li>
        </ul>
    </div>
    @endforeach
</div>

{{$adotantes->links()}}

@endsection