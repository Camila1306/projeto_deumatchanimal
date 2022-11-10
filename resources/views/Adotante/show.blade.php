@extends('layouts.app')
@section('title', 'Adotante - {{$adotante->nome}}')
@section('content')
<div class="card w-50">
    <div class="card-img">
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
                $nomeimagem = "./img/adotantes/semfoto.jfif";
            }
        @endphp
        {{Html::image(asset($nomeimagem), 'Foto de '.$adotante->nome,["class"=>"card-img-top-thumbnail w-100"])}}
    </div>
    <div class="card-header">
        <h1>adotante - {{$adotante->nome}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">
            ID: {{$adotante->id}}
        </h3>
        <p class="card-text">
            <strong>E-mail:</strong> {{$adotante->email}}<br>
            <strong>Telefone:</strong> {{$adotante->telefone}}<br>
            <strong>Rua:</strong> {{$adotante->rua}}<br>
            <strong>Numero:</strong> {{$adotante->numero}}<br>
            <strong>Bairro:</strong> {{$adotante->bairro}}<br>
            <strong>CEP</strong> {{$adotante->CEP}}<br>
            <strong>Cidade:</strong> {{$adotante->cidade}}<br>
            <strong>Estado:</strong> {{$adotante->estado}}<br>
            <strong>Casa/Apartamento:</strong> {{$adotante->casa_ap}}<br>
            <strong>Viagem:</strong> {{$adotante->viagem}}<br>
            <strong>Renda:</strong> {{$adotante->renda}}<br>
            <strong>Adaptação:</strong> {{$adotante->adaptacao}}<br>
            <strong>Hobbies:</strong> {{$adotante->hobbies}}<br>
            <strong>Planejamento:</strong> {{$adotante->planejamento}}<br>
        </p>
    </div>
    <div class="card-footer">
            {{Form::open(['route' => ['adotantes.destroy', $adotante->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/adotantes/semfoto.png")
                {{Form::hidden('foto', $nomeimagem)}}
            @endif
                <a href="{{url('adotantes/'.$adotante->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
                {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
        <a href="{{url('adotantes/')}}" class="btn btn-outline-secondary">Voltar</a>
            {{Form::close()}}
    </div>
</div>
<br>

<div class="card w-70 m-auto">
    <div class="card-header">
        <h1>Adotados</h1>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Pet</th>
                <th>Data</th>
                <th>Data visita</th>
            </tr>
            @foreach ($adotante->adotados as $adotado)
            <tr>
                <td><a href="{{url('adotados/'.$adotado->id)}}">{{$adotado->id}}</a></td>
                <td>{{$adotado->pet_id}} - {{$adotado->pet->nome}}</td>
                <td>{{\Carbon\Carbon::create($adotado->datahora)->format('d/m/Y H:i:s')}}</td>
                <td>{!!$adotado->visita!!}</td>
            </tr>
                
            @endforeach
        </table>
    </div>
</div>
@endsection