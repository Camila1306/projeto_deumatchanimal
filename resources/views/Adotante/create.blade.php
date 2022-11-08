@extends('layouts.app')
@section('title','Adicionar novo Adotante')
@section('content')
<h1>Adicionar novo Adotante</h1><br>
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
{{Form::open(['route'=>'adotantes.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
{{Form::label('nome', 'Nome')}}
{{Form::text('nome','',['class'=>'form-control', 'required', 'placeholder'=>'Nome completo'])}}
{{Form::label('email', 'E-mail')}}
{{Form::text('email','',['class'=>'form-control', 'required', 'placeholder'=>'E-mail', 'pattern'=>'[\w+.]+@\w+\.\w{2,3}(?:\.\w{2})?', 'title'=>'exemplo: exemplo@gmail.com'])}}
{{Form::label('telefone', 'Telefone')}}
{{Form::text('telefone','',['class'=>'form-control', 'required', 'placeholder'=>'(99) 99999-9999', 'pattern'=>'(\([0-9]{2}\))\s([9]{1})?([0-9]{4,5})-([0-9]{4})', 'title'=>'Número informado deve ser no formato (99) 99999-9999'])}}
{{Form::label('rua', 'Rua/ Avenida')}}
{{Form::text('rua','',['class'=>'form-control', 'required', 'placeholder'=>'Rua/Avenida'])}}
{{Form::label('numero', 'Número')}}
{{Form::text('numero','',['class'=>'form-control', 'required', 'placeholder'=>'Número'])}}
{{Form::label('bairro', 'Bairro')}}
{{Form::text('bairro','',['class'=>'form-control', 'required', 'placeholder'=>'Bairro'])}}
{{Form::label('CEP', 'CEP')}}
{{Form::text('CEP','',['class'=>'form-control', 'required', 'placeholder'=>'CEP'])}}
{{Form::label('cidade', 'Cidade')}}
{{Form::text('cidade','',['class'=>'form-control', 'required', 'placeholder'=>'Cidade'])}}
{{Form::label('estado', 'Estado')}}
{{Form::text('estado','',['class'=>'form-control', 'required', 'placeholder'=>'Estado'])}}

{{Form::label('casa_ap', 'Casa ou Apartamento?')}}
{{Form::select('casa_ap',array('Casa'=>'Casa', 'Apartamento'=>'Apartamento'), 'Casa',['class'=>'form-control', 'required'])}}
{{Form::label('viagem', 'Em caso de viagem, terá alguém para cuidar do pet enquanto estiver fora?')}}
{{Form::select('viagem',array('Não'=>'Não', 'Sim'=>'Sim'), 'Não',['class'=>'form-control', 'required' ])}}
{{Form::label('renda', 'Renda mensal')}}
{{Form::text('renda','',['class'=>'form-control', 'required', 'placeholder'=>'Informe a renda mensal em reais' ])}}

{{Form::label('adaptacao', 'Liste se há crianças, idosos e animais que residem com você')}}
{{Form::text('adaptacao','',['class'=>'form-control','required', 'placeholder'=>'Exemplo: crianças, cachorro e gato' ])}}

{{Form::label('hobbies', 'Seus Hobbies')}}
{{Form::text('hobbies','',['class'=>'form-control', 'required', 'placeholder'=>'Informe seus hobbies' ])}}
{{Form::label('planejamento', 'Planejamento para seu novo amigo')}}
{{Form::text('planejamento','',['class'=>'form-control', 'required', 'placeholder'=>'Exemplo: Aos sábados iremos passear no parque.' ])}}

{{Form::label('foto', 'Foto da residencia')}}
{{Form::file('foto', ['class' => 'form-control', 'id'=>'foto'])}}
<br>
{{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
{{ Form::close()}}
@endsection
