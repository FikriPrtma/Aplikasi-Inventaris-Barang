@extends('layouts/main')

@section('body')
    <h1>Selamat datang, {{ auth()->user()->nama }}</h1>
@endsection