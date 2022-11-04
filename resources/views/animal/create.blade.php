@if ((Auth::check()) && (Auth::user()->isAdmin()))
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
{{Form::open(['route'=>'animais.store', 'method'=>'POST'])}}
{{Form::label('nome', 'Nome')}}
{{Form::text('nome','',['class'=>'form-control', 'required', 'placeholder'=>'Exemplo:  Luna'])}}
{{Form::label('especie', 'Espécie')}}
{{Form::text('especie','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione a espécie', 'list'=>'listespecie' ])}}
<datalist id="listespecie">
    @foreach ($especies as $especie)
        <option value="{{$especie->id}}">{{$especie->nome}}</option>
    @endforeach
</datalist>
{{Form::label('porte', 'Porte')}}
{{Form::text('porte','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione o porte', 'list'=>'listporte' ])}}
<datalist id="listporte">
        <option value="pequeno" selected>Pequeno</option>
        <option value="medio" >Médio</option>
        <option value="grande" >Grande</option>
        <option value="gigante" >Gigante</option>
</datalist>
@foreach ($adaptacoes as $adaptacao)
{{Form::label('adaptacao', 'Adaptação')}}
{{Form::checkbox('adaptacao',$adaptacao->id,['class'=>'form-control', 'placeholder'=>$adaptacao->tipo ])}}
@endforeach
@foreach ($temperamentos as $temperamento)
{{Form::label('temperamento', 'Temperamento')}}
{{Form::checkbox('temperamento',$temperamento->id,['class'=>'form-control', 'placeholder'=>$temperamento->tipo ])}}
@endforeach
{{Form::label('idade', 'Idade')}}
{{Form::text('idade','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione a idade', 'list'=>'listidade' ])}}
<datalist id="listidade">
        <option value="filhote" selected>Filhote</option>
        <option value="adulto" >Adulto</option>
        <option value="idoso" >Idoso</option>
</datalist>
{{Form::label('tamanho_pelo', 'Sexo')}}
{{Form::text('sexo','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione o sexo', 'list'=>'listsexo' ])}}
<datalist id="listsexo">
        <option value="feminino" selected>Feminino</option>
        <option value="masculino" >Masculino</option>
</datalist>
{{Form::label('tamanho_pelo', 'Tamanho do pelo')}}
{{Form::text('tamanho_pelo','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione o tamanho_pelo', 'list'=>'listtamanho_pelo' ])}}
<datalist id="listtamanho_pelo">
        <option value="curto" selected>Curto</option>
        <option value="longo" >Longo</option>
        <option value="encaracolado" >Encaracolado</option>
        <option value="dupla" >Dupla</option>
        <option value="longocurto" >Longo e Curto</option>
</datalist>
{{Form::label('pelagem', 'Cor do pelo')}}
{{Form::text('pelagem','',['class'=>'form-control', 'required', 'placeholder'=>'Selecione a cor do pelo', 'list'=>'listpelagem' ])}}
<datalist id="listpelagem">
    @foreach ($pelagens as $pelagem)
        <option value="{{$pelagem->id}}">{{$pelagem->cor}}</option>
    @endforeach
</datalist>
{{Form::label('historia', 'História de vida')}}
{{Form::text('historia','', ['class'=>'form-control', 'required', 'palceholder'=>'Informe a história do animal'])}}
{{Form::label('adotado', 'Adotado')}}
{{Form::text('adotado','', ['class'=>'form-control', 'required', 'palceholder'=>'sim/ não'])}}

{{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-outline-danger'])!!}
{{ Form::close()}}
@endsection
@endif