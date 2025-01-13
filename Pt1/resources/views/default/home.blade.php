@extends('layout')

@section('title', 'Home')

@section('stylesheets')
    @parent
@endsection

@section('content')

    <div>
      <img src="{{ asset ('img/logo.png') }}" alt="">
      <h2>UF2-Pt2b</h2>
      <hr>
      <h3>Pràctica per iniciar-se en els conceptes bàsics de Laravel</h3>
      @if (Cookie::has('autor'))
        <a href="{{ route('home_delete_cookie') }}">Esborrar Cookies</a>
      
      @endif
      @if (session('status'))
        <div>
            <strong>Success!</strong> {{ session('status') }}  
        </div>
    @endif
    </div>
@endsection
