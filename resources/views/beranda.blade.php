@extends('layouts/main')
<link rel="stylesheet" href="public\assets\css\beranda\style.css">
@section('body')
    <h1>Selamat datang, {{ auth()->user()->nama }}</h1>
    <h1 id="current-time">12:00:00</h1>
    <script>

        let time = document.getElementById("current-time");

        setInterval(() => {
            let d = new Date();
            time.innerHTML= d.toLocaleTimeString();
        }, 1000)
        

    </script>
@endsection