<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris Barang</title>

    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap4.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {        
            @if (session()->has('asuccess'))
                Swal.fire({
                    position: 'top',
                    title: 'Berhasil',
                    text: '{{ session('asuccess') }}',
                    icon: 'success',
                    confirmButtonColor: '#fbb710',
                });
            @endif

            @if (session()->has('aerror'))
                Swal.fire({
                    position: 'top',
                    title: 'Gagal',
                    text: '{{ session('aerror') }}',
                    icon: 'error',
                    confirmButtonColor: '#fbb710',
                });
            @endif
        });
    </script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Inventaris Barang</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/barang') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/barang-masuk') }}">Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/barang-keluar') }}">Barang Keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/laporan') }}">Laporan Barang</a>
                    </li>
                    @if(auth()->user())
                        <li class="nav-item">
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link border-0">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
