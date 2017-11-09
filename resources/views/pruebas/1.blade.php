@extends('layouts.menu')

@section('contenido')
<div id="app">
  <p>@{{ message }}</p>
  <input v-model="message">
  
</div>


@endsection
