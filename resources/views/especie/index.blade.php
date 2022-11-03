@if ((Auth::check()) && (Auth::user()->isAdmin()))
@extends('layouts.app')
@section('title', 'Listagem de Espécies')
@section('content')
<h1>Listagem de Espécies</h1>
@if(Session::has('mensagem'))
<div class="alert alert-success">
  {{Session::get('mensagem')}}
</div>
@endif
<br>

{{Form::open(['url'=>'especies/buscar', 'method'=>'GET'])}}
<div class="row">
  <div class="col-sm-3">
    <a class="btn btn-outline-success" href="{{url('contatos/create')}}">Criar</a>
  </div>
  <div class="col-sm-9">
    <div class="input-group m1-5">
      @if($busca !== null)
      &nbsp;<a class="btn btn-outline-secondary" href="{{url('contatos/')}}">Todos</a>&nbsp;
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
<table class="table table-striped table-hover">
  @foreach ($especies as $especie)
  <tr>
    <td>
      {{$especie->especie}}
    </td>
  </tr>
  @endforeach
</table>

{{$especies->links()}}

@endsection
@endif