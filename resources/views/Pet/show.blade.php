@extends('layouts.app')
@section('title', 'Pet - {{$pet->nome}}')
@section('content')
<div class="card w-50">
    <div class="card-img">
        @php
            $nomeimagem = "";
            if(file_exists("./img/pets/".md5($pet->id).".jpg")){
                $nomeimagem = "./img/pets/".md5($pet->id).".jpg";
            } elseif(file_exists("./img/pets/".md5($pet->id).".png")){
                $nomeimagem = "./img/pets/".md5($pet->id).".png";
            } elseif(file_exists("./img/pets/".md5($pet->id).".gif")){
                $nomeimagem = "./img/pets/".md5($pet->id).".gif";
            } elseif(file_exists("./img/pets/".md5($pet->id).".webp")){
                $nomeimagem = "./img/pets/".md5($pet->id).".webp";
            } elseif(file_exists("./img/pets/".md5($pet->id).".jpeg")){
                $nomeimagem = "./img/pets/".md5($pet->id).".jpeg";
            } elseif(file_exists("./img/pets/".md5($pet->id).".jfif")){
                $nomeimagem = "./img/pets/".md5($pet->id).".jfif";
            } else {
                $nomeimagem = "./img/pets/semfoto.jfif";
            }
        @endphp
        {{Html::image(asset($nomeimagem), 'Foto de '.$pet->nome,["class"=>"card-img-top-thumbnail w-100"])}}
    </div>
    <div class="card-header">
        <h1>pet - {{$pet->nome}}</h1>
    </div>
    <div class="card-body">
        <h3 class="card-title">
            ID: {{$pet->id}}
        </h3>
        <p class="card-text">
            <strong>Espécie:</strong> {{$pet->especie}}<br>
            <strong>Porte:</strong> {{$pet->porte}}<br>
            <strong>Idade:</strong> {{$pet->idade}}<br>
            <strong>Sexo:</strong> {{$pet->sexo}}<br>
            <strong>Tamanho do pelo:</strong> {{$pet->tamanho_pelo}}<br>
            <strong>Cor do pelo:</strong> {{$pet->cor_pelo}}<br>
            <strong>História:</strong> {{$pet->historia}}<br>
            <strong>Adaptação:</strong> {{$pet->adaptacao}}<br>
            <strong>Temperamento:</strong> {{$pet->temperamento}}<br>
        </p>
    </div>
    <div class="card-footer">
        @if ((Auth::check()) && (Auth::user()->isAdmin()))
            {{Form::open(['route' => ['pets.destroy', $pet->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/pets/semfoto.png")
                {{Form::hidden('foto', $nomeimagem)}}
            @endif
                <a href="{{url('pets/'.$pet->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
                {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
        @endif
        <a href="{{url('pets/')}}" class="btn btn-outline-secondary">Voltar</a>
        @if ((Auth::check()) && (Auth::user()->isAdmin()))
            {{Form::close()}}
        @endif
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
                <th>Nome</th>
                <th>Data</th>
            </tr>
            @foreach ($pet->adotados as $adotado)
            <tr>
                <td><a href="{{url('adotados/'.$adotado->id)}}">{{$adotado->id}}</a></td>
                <td>{{$adotado->pet_id}} - {{$adotado->adotante->nome}}</td>
                <td>{{\Carbon\Carbon::create($adotado->datahora)->format('d/m/Y H:i:s')}}</td>

            </tr>
                
            @endforeach
        </table>
    </div>
</div>

@endsection