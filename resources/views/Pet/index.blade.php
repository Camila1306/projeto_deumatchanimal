@extends('layouts.app')
@section('title', 'Listagem de Pets')
@section('content')
    <h1>Listagem de Pets</h1>
    @if(Session::has('mensagem'))
    <div class="alert alert-success">
            {{Session::get('mensagem')}}
    </div>    
    @endif
    <br>

    {{Form::open(['url'=>'pets/buscar', 'method'=>'GET'])}}
    <div class="row">
        @if ((Auth::check()) && (Auth::user()->isAdmin()))
            <div class="col-sm-3">
                <a class="btn btn-outline-success" href="{{url('pets/create')}}">Adicionar</a>
            </div>
        @endif
        <div class="col-sm-9">    
            <div class="input-group m1-5">
                @if($busca !== null)
                    &nbsp;<a class="btn btn-outline-secondary" href="{{url('pets/')}}">Todos</a>&nbsp;
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
           @foreach ($pets as $pet)
        <div class="card mb-3" style="max-width: 540px;">
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
                {{Html::image(asset($nomeimagem), 'Foto de '.$pet->nome,)}}
            <div class="card-body">
              <h5 class="card-title"><a href="{{url('pets/'.$pet->id)}}"> {{$pet->nome}}</a></h5>
              <p class="card-text">{{$pet->historia}}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Espécie:</strong> {{$pet->especie}}</li>
              <li class="list-group-item"> <strong>Idade:</strong> {{$pet->idade}}</li>
              <li class="list-group-item"><strong>Porte:</strong> {{$pet->porte}}</li>
            </ul>
            <div class="card-body">
              <a href="{{url('adotados/create')}}" class="card-link">Adotar</a>
            </div>
        </div>
        @endforeach
      </div>
       {{$pets->links()}}

@endsection