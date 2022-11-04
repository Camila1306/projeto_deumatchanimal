@extends('layouts.app')
@section('title', 'Animal - {{$animal->nome}}')
@section('content')
<div class="card w-50">
    <div class="card-img">
        @php
            $nomeimagem = "";
            if(file_exists("./img/animais/".md5($animal->id).".jpg")){
                $nomeimagem = "./img/animais/".md5($animal->id).".jpg";
            } elseif(file_exists("./img/animais/".md5($animal->id).".png")){
                $nomeimagem = "./img/animais/".md5($animal->id).".png";
            } elseif(file_exists("./img/animais/".md5($animal->id).".gif")){
                $nomeimagem = "./img/animais/".md5($animal->id).".gif";
            } elseif(file_exists("./img/animais/".md5($animal->id).".webp")){
                $nomeimagem = "./img/animais/".md5($animal->id).".webp";
            } elseif(file_exists("./img/animais/".md5($animal->id).".jpeg")){
                $nomeimagem = "./img/animais/".md5($animal->id).".jpeg";
            } else {
                $nomeimagem = "./img/animais/semfoto.png";
            }
        @endphp
        {{Html::image(asset($nomeimagem), 'Foto de '.$animal->nome,["class"=>"card-img-top-thumbnail w-100"])}}
    </div>
    <div class="card-header">
        <h1>Animal - {{$animal->nome}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">
            ID: {{$animal->id}}
        </h3>
        <p class="text">
            Espécie: {{$animal->especie}}<br>
            Porte: {{$animal->porte}}<br>
            Adaptação: {{$animal->adaptacao}}<br>
            Temperamento: {{$animal->temperamento}}
            Idade: {{$animal->idade}}
            Sexo: {{$animal->sexo}}
            Tamanho do pelo: {{$animal->tamanho_pelo}}
            Cor do pelo: {{$animal->cor_pelo}}
            História: {{$animal->historia}}
        </p>
    </div>
    <div class="card-footer">
            {{Form::open(['route' => ['animais.destroy', $contato->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/animais/semfoto.png")
                {{Form::hidden('foto', $nomeimagem)}}
            @endif
                <a href="{{url('animais/'.$contato->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
                {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
        <a href="{{url('animais/')}}" class="btn btn-outline-secondary">Voltar</a>
            {{Form::close()}}
    </div>
</div>
<br>
