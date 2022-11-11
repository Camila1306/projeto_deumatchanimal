@extends('layouts.app')
@section('title', 'Listagem de Adoção')
@section('content')
    <h1>Listagem de Adoção</h1>
    @if(Session::has('mensagem'))
    <div class="alert alert-success">
            {{Session::get('mensagem')}}
    </div>    
    @endif
    <br>

    {{Form::open(['url'=>'adotados/buscar', 'method'=>'GET'])}}
    <div class="row">

            <div class="col-sm-3">
                <a class="btn btn-outline-success" href="{{url('adotados/create')}}">Adicionar</a>
            </div>
        <div class="col-sm-9">    
            <div class="input-group m1-5">
                @if($busca !== null)
                    &nbsp;<a class="btn btn-outline-secondary" href="{{url('adotados/')}}">Todos</a>&nbsp;
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
                <th>Pet</th>
                <th>Adotante</th>
                <th>Data</th>
                <th>Obs</th>
            </tr>
            @foreach ($adotados as $adotado)
            <tr class="text-center">
                <td>
                    <a href="{{url('adotados/'.$adotado->id)}}">{{$adotado->id}}</a>
                </td>
                <td>
                    {{$adotado->pet_id}}
                </td>
                <td>
                    {{$adotado->adotante_id}} - {{$adotado->pet->nome}}
                </td>
                <td>
                    {{\Carbon\Carbon::create($adotado->datahora)->format('d/m/Y H:i:s')}}
                </td>
                <td>
                    {{$adotado->obs}}
                </td>
            </tr>
            @endforeach
       </table> 

       {{$adotados->links()}}
@endsection