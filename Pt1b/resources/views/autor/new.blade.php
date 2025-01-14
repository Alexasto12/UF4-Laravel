@extends('layout')

@section('title', 'Nou Autor')

@section('stylesheets')
    @parent
@endsection

@section('content')
    <h1>Nou Autor</h1>
    <a href="{{ route('autor_list') }}">&laquo; Torna</a>
    <div style="margin-top: 20px">
        <form method="POST" action="{{ route('autor_new') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}" />
                @error('nom')
                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>            
                <label for="cognoms">Cognoms</label>
                <input type="text" name="cognoms" value="{{ old('cognoms') }}" />
                @error('cognoms')
                    <div class="alert alert-danger"style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="file" name="imatge">
            </div>
            <button type="submit">Crear Autor</button>
        </form>
    </div>
@endsection
