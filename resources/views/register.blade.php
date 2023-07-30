@extends('layouts/main')

@section('body')
    <form action="{{ url('/register') }}" method="POST">
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

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="nama">Nama Lengkap *</label>
            </small>
            <input type="text" name="nama"  class="form-control @error('nama') is-invalid @enderror" placeholder="Nama lengkap" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="text-end">
                <a href="{{ url('/login') }}" class="btn btn-dark btn-sm rounded-0">Kembali</a>
                <button class="btn btn-primary btn-sm rounded-0" type="submit">Daftar baru</button>
            </div>
        </div>
    </form>

@endsection