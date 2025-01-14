@extends('layout')

@section('title', 'Edit Llibre')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Edita el llibre</h1>
<a href="{{ route('autor_list') }}">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="{{ route('autor_edit', $autor->id)}}"enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{ $autor->nom }}" />
            @error('nom')
                <div class="alert alert-danger" style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="cognom">Cognom</label>
            <input type="text" name="cognoms" value="{{ $autor->cognoms }}" />
            @error('cognoms')
                <div class="alert alert-danger" style="color: red">{{ $message }}</div>
            @enderror
        </div>
        @if (isset($autor->imatge))
        <div>
            Imatge actual: <b>{{$autor->imatge}}</b>
            <input type="checkbox" name="deleteImage"> Esborrar Imatge</p>
        </div>
        @else
        <div>
            <input type="file" name="imatge">
        </div>
        @endif
        <div>
            <button type="submit">Actualitzar Autor</button>
        </div>
    </form>

    @endsection