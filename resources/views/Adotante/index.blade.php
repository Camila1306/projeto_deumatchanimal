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
                <th>Rua</th>
                <th>Nº</th>
                <th>Bairro</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Casa/Apartamento</th>
                <th>Viagem</th>
                <th>Renda</th>
                <th>Adaptação</th>
                <th>Hobbies</th>
                <th>Planejamento</th>

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
                    {{$adotante->email}}
                </td>
                <td>
                    {{$adotante->telefone}}
                </td>
                <td>
                    {{$adotante->rua}}
                </td>
                <td>
                    {{$adotante->numero}}
                </td>
                <td>
                    {{$adotante->bairro}}
                </td>
                <td>
                    {{$adotante->CEP}}
                </td>
                <td>
                    {{$adotante->cidade}}
                </td>
                <td>
                    {{$adotante->estado}}
                </td>
                <td>
                    {{$adotante->casa_ap}}
                </td>
                <td>
                    {{$adotante->viagem}}
                </td>
                <td>
                    {{$adotante->renda}}
                </td>
                <td>
                    {{$adotante->adaptacao}}
                </td>
                <td>
                    {{$adotante->hobbies}}
                </td>
                <td>
                    {{$adotante->planejamento}}
                </td>
            </tr>
            @endforeach
       </table> 

       {{$adotantes->links()}}

@endsection