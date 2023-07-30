@extends('layouts/main')

@section('body')
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="email">Alamat Email *</label>
            </small>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="password">Kata Sandi *</label>
            </small>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata sandi">
            @error('password')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-9 mb-2">
                <small class="ms-2">Belum punya akun?</small>
                <a class="link-primary" href="{{ url('/register') }}">Klik disini untuk mendaftar!</a>
            </div>
            <div class="col-md-3 text-end">
                <button class="btn btn-primary btn-sm rounded-0" type="submit">Masuk</button>
            </div>
        </div>
    </form>
@endsection