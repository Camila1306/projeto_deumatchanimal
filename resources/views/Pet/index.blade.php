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

            <div class="col-sm-3">
                <a class="btn btn-outline-success" href="{{url('pets/create')}}">Adicionar</a>
            </div>
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
       <table  class="table table-striped table-hover">
            <tr class="text-center">
                <th>Id</th>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Porte</th>
                <th>Adaptação</th>
                <th>Temperamento</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>Tamanho do Pelo</th>
                <th>Cor do Pelo</th>
                <th>Historia</th>

            </tr>
            @foreach ($pets as $pet)
            <tr>
                <td>
                    <a href="{{url('pets/'.$pet->id)}}">{{$pet->id}}</a>
                </td>
                <td>
                    {{$pet->nome}}
                </td>
                <td>
                    {{$pet->especie}}
                </td>
                <td>
                    {{$pet->porte}}
                </td>
                <td>
                    {{$pet->adaptacao}}
                </td>
                <td>
                    {{$pet->temperamento}}
                </td>
                <td>
                    {{$pet->idade}}
                </td>
                <td>
                    {{$pet->sexo}}
                </td>
                <td>
                    {{$pet->tamanho_pelo}}
                </td>
                <td>
                    {{$pet->cor_pelo}}
                </td>
                <td>
                    {{$pet->historia}}
                </td>
            </tr>
            @endforeach
       </table> 
       <div class="card-group">
           @foreach ($pets as $pet)
           <div class="card">
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
            <h5 class="card-title"><a href="{{url('pets/'.$pet->id)}}">ID: {{$pet->id}}</a></h5>
            <p class="card-text">Nome: {{$pet->nome}}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
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
            <h5 class="card-title"><a href="{{url('pets/'.$pet->id)}}">ID: {{$pet->id}}</a></h5>
            <p class="card-text">Nome: {{$pet->nome}}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card">
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
            <h5 class="card-title"><a href="{{url('pets/'.$pet->id)}}">ID: {{$pet->id}}</a></h5>
            <p class="card-text">Nome: {{$pet->nome}}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>

        @endforeach
      </div>
       {{$pets->links()}}

@endsection