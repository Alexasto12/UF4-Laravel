@extends('layout')

@section('title', 'Nou Llibre')

@section('stylesheets')
    @parent
@endsection

@section('content')
    <h1>Nou Llibre</h1>
    <a href="{{ route('llibre_list') }}">&laquo; Torna</a>
	<div style="margin-top: 20px">
        <form method="POST" action="{{ route('llibre_new') }}">
            @csrf
            <div>
            @error('titol')
                <div class="alert alert-danger" style="color: red">{{ $message }}</div>
            @enderror
            <label for="titol">Títol</label>
            <input type="text" name="titol" />
            </div>
            <div>
            @error('dataP')
                <div class="alert alert-danger" style="color: red">{{ $message }}</div>
            @enderror            
            <label for="dataP">Data de publicació</label>
            <input type="date" name="dataP" value="{{date_create("now")->format('Y-m-d')}}"/>
            </div>
            @error('vendes')
                <div class="alert alert-danger" style="color: red">{{ $message }}</div>
            @enderror
            <div>                            
            <label for="vendes">Vendes</label>
            <input type="number" name="vendes" />
            </div>
            <div>
            <label for="autor_id">Autor</label>
            <select name="autor_id">    
               <option value="">Selecciona un autor</option>
                @foreach ($autors as $autor)
                <option value="{{ $autor->id }}" @selected(old('autor_id', Cookie::get('autor')) == $autor->id)>{{ $autor->nomCognoms() }}</option>
                @endforeach
                
            </select>
            </div>
            <button type="submit">Crear Llibre</button>
        </form>
	</div>
@endsection
