@if ((Auth::check()) && (Auth::user()->isAdmin()))
@extends('layouts.app')
@section('title','Criar nova Adaptação')
@section('content')
<h1>Criar Nova Adaptação</h1><br>
@if(count($errors)>0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>
      {{$error}}
    </li>

    @endforeach
  </ul>
</div>
@endif
{{Form::open(['route'=>'adaptacao_animais.store', 'method'=>'POST'])}}
{{Form::label('adaptacao_animal', 'Adaptação')}}
{{Form::text('adaptacao_animal','',['class'=>'form-control', 'required', 'placeholder'=>'Exemplo:  Gato'])}}
{{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
{{ Form::close()}}
@endsection
@endif