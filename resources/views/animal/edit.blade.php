@extends('layouts.app')
@section('title','Adicionar novo animal')
@section('content')
<h1>Adicionar novo animal</h1><br>
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
{{Form::open(['route'=>'animais.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
{{Form::label('nome', 'Nome')}}
{{Form::text('nome',$animal->nome,['class'=>'form-control', 'required', 'placeholder'=>'Exemplo:  Luna'])}}
{{Form::label('especie', 'Espécie')}}
{{Form::text('especie',$animal->especie,['class'=>'form-control', 'required', 'placeholder'=>'Selecione a espécie', 'list'=>'listespecie' ])}}
<datalist id="listespecie">
        <option value="gato">Gato</option>
        <option value="cachorro" >Cachorro</option>
</datalist>
{{Form::label('porte', 'Porte')}}
{{Form::text('porte',$animal->porte,['class'=>'form-control', 'required', 'placeholder'=>'Selecione o porte', 'list'=>'listporte' ])}}
<datalist id="listporte">
        <option value="pequeno">Pequeno</option>
        <option value="medio" >Médio</option>
        <option value="grande" >Grande</option>
        <option value="gigante" >Gigante</option>
</datalist>
{{Form::label('adaptacao', 'Adaptação')}}
{{Form::text('adaptacao',$animal->adaptacao,['class'=>'form-control', 'required', 'placeholder'=>'Exemplo: se adapta com crianças e cachorros' ])}}

{{Form::label('temperamento', 'Temperamento')}}
{{Form::text('temperamento',$animal->temperamento,['class'=>'form-control','required', 'placeholder'=>'Exemplo: calmo, bagunceiro' ])}}

{{Form::label('idade', 'Idade')}}
{{Form::text('idade',$animal->idade,['class'=>'form-control', 'required', 'placeholder'=>'Selecione a idade', 'list'=>'listidade' ])}}
<datalist id="listidade">
        <option value="filhote">Filhote</option>
        <option value="adulto" >Adulto</option>
        <option value="idoso" >Idoso</option>
</datalist>
{{Form::label('tamanho_pelo', 'Sexo')}}
{{Form::text('sexo',$animal->sexo,['class'=>'form-control', 'required', 'placeholder'=>'Selecione o sexo', 'list'=>'listsexo' ])}}
<datalist id="listsexo">
        <option value="feminino">Feminino</option>
        <option value="masculino" >Masculino</option>
</datalist>
{{Form::label('tamanho_pelo', 'Tamanho do pelo')}}
{{Form::text('tamanho_pelo',$animal->tamanho_pelo,['class'=>'form-control', 'required', 'placeholder'=>'Selecione o tamanho_pelo', 'list'=>'listtamanho_pelo' ])}}
<datalist id="listtamanho_pelo">
        <option value="sem_pelo">Sem pelos</option>
        <option value="curto_liso" >Curto e liso</option>
        <option value="curto_duro" >Curto e duro</option>
        <option value="longo_liso" >Longo e liso</option>
        <option value="longo_ondulado" >Longo  e ondulado/encaracolado</option>
        <option value="duplo" >Duplo</option>
</datalist>
{{Form::label('cor_pelo', 'Cor do pelo')}}
{{Form::text('cor_pelo',$animal->cor_pelo,['class'=>'form-control', 'required', 'placeholder'=>'Exemplo: caramelo' ])}}
{{Form::label('historia', 'História de vida')}}
{{Form::text('historia',$animal->historia, ['class'=>'form-control', 'required', 'palceholder'=>'Informe a história do animal'])}}
{{Form::label('foto', 'Foto')}}
{{Form::file('foto', ['class' => 'form-control', 'id'=>'foto'])}}
<br>
{{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
<a href="{{url('animais/')}}" class="btn btn-outline-secondary">Voltar</a>&nbsp;
{{ Form::close()}}
@endsection