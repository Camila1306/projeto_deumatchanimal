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
                    {{$pet->adptacao}}
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


@endsection