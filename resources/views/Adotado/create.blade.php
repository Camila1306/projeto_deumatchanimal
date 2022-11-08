@extends('layouts.app')
@section('title','Adicionar nova Adoção')
@section('content')
<h1>Adicionar nova Adoção</h1><br>
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
{{Form::open(['route'=>'adotados.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
{{Form::label('pet_id', 'Pet')}}
{{Form::text('pet_id','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione o Pet', 'list'=>'listpet'])}}
<datalist id="listpet">
  @foreach ($pets as $pet)
    <option value="{{$pet->id}}">{{$pet->nome}}</option>
    @endforeach
</datalist>
{{Form::label('adotante_id', 'Adotante')}}
{{Form::text('adotante_id','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione o Pet', 'list'=>'listadotante'])}}
<datalist id="listadotante">
  @foreach ($adotantes as $adotante)
    <option value="{{$adotante->id}}">{{$adotante->nome}}</option>
    @endforeach
</datalist>
{{Form::label('datahora','Data da adoção')}}
{{Form::text('datahora', \Carbon\Carbon::now()->format('d/m/Y H:i:s'), ['class'=>'form-control', 'required', 'placeholder' => 'Data', 'rows'=>'8'])}}
{{Form::label('obs', 'Obs')}}
{{Form::text('obs','',['class'=>'form-control','required', 'placeholder'=>'Observação' ])}}

{{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
{{ Form::close()}}
@endsection
