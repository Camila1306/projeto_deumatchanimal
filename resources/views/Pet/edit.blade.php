@extends('layouts.app')
@section('title','Adicionar novo Pet')
@section('content')
<h1>Adicionar novo Pet</h1><br>
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
{{Form::open(['route'=>['pets.update', $pet->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}
{{Form::label('nome', 'Nome')}}
{{Form::text('nome',$pet->nome,['class'=>'form-control', 'required', 'placeholder'=>'Exemplo:  Luna'])}}
{{Form::label('especie', 'Espécie')}}
{{Form::select('especie',array('Gato'=>'Gato', 'Cachorro'=>'Cachorro'), $pet->especie,['class'=>'form-control', 'required'])}}
{{Form::label('porte', 'Porte')}}
{{Form::select('porte',array('Pequeno'=>'Pequeno', 'Médio'=>'Médio','Grande'=>'Grande', 'Gigante'=>'Gigante' ), $pet->porte,['class'=>'form-control', 'required' ])}}
{{Form::label('adaptacao', 'Adaptação')}}
{{Form::text('adaptacao',$pet->adaptacao,['class'=>'form-control', 'required', 'placeholder'=>'Exemplo: se adapta com crianças e cachorros' ])}}

{{Form::label('temperamento', 'Temperamento')}}
{{Form::text('temperamento',$pet->temperamento,['class'=>'form-control','required', 'placeholder'=>'Exemplo: calmo, bagunceiro' ])}}

{{Form::label('idade', 'Idade')}}
{{Form::select('idade',array('Filhote'=>'Filhote', 'Adulto'=>'Adulto', 'Idoso'=>'Idoso'), $pet->idade,['class'=>'form-control', 'required' ])}}

{{Form::label('tamanho_pelo', 'Sexo')}}
{{Form::select('sexo',array('Feminino'=>' Feminino', 'Masculino'=>'Masculino'), $pet->sexo,['class'=>'form-control', 'required'])}}
{{Form::label('tamanho_pelo', 'Tamanho do pelo')}}
{{Form::select('tamanho_pelo',array('Sem pelos'=> 'Sem pelos', 'Curto e liso'=>'Curto e liso', 'Curto e duro'=>'Curto e duro', 'Longo e liso'=>'Longo e liso', 'Longo  e ondulado/encaracolado'=>'Longo  e ondulado/encaracolado', 'Duplo'=> 'Duplo'), $pet->tamanho_pelo,['class'=>'form-control', 'required', 'placeholder'=>'Selecione o tamanho_pelo', 'list'=>'listtamanho_pelo' ])}}

{{Form::label('cor_pelo', 'Cor do pelo')}}
{{Form::text('cor_pelo',$pet->cor_pelo,['class'=>'form-control', 'required', 'placeholder'=>'Exemplo: caramelo' ])}}
{{Form::label('historia', 'História de vida')}}
{{Form::text('historia',$pet->historia, ['class'=>'form-control', 'required', 'palceholder'=>'Informe a história do animal'])}}

{{Form::label('foto', 'Foto')}}
{{Form::file('foto', ['class' => 'form-control', 'id'=>'foto'])}}
<br>
{{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
{{ Form::close()}}
@endsection
