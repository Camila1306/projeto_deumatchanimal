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
       <table  class="table table-striped table-hover">
            <tr class="text-center">
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th></th>
                <th>Adaptação</th>
                <th>Temperamento</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>Tamanho do Pelo</th>
                <th>Cor do Pelo</th>
                <th>Historia</th>

            </tr>
            @foreach ($adotantes as $adotante)
            <tr>
                <td>
                    <a href="{{url('adotantes/'.$adotante->id)}}">{{$adotante->id}}</a>
                </td>
                <td>
                    {{$adotante->nome}}
                </td>
                <td>
                    {{$adotante->especie}}
                </td>
                <td>
                    {{$adotante->porte}}
                </td>
                <td>
                    {{$adotante->adptacao}}
                </td>
                <td>
                    {{$adotante->temperamento}}
                </td>
                <td>
                    {{$adotante->idade}}
                </td>
                <td>
                    {{$adotante->sexo}}
                </td>
                <td>
                    {{$adotante->tamanho_pelo}}
                </td>
                <td>
                    {{$adotante->cor_pelo}}
                </td>
                <td>
                    {{$adotante->historia}}
                </td>
            </tr>
            @endforeach
       </table> 


@endsection