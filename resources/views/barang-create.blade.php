@extends('layouts/main')

@section('body')
    <form action="{{ url('barang/create') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="nama_barang">Nama Barang *</label>
            </small>
            <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama barang" value="{{ old('nama_barang') }}">
            @error('nama_barang')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="text-end">
                <a href="{{ url('/barang') }}" class="btn btn-dark btn-sm rounded-0">Kembali</a>
                <button class="btn btn-primary btn-sm rounded-0" type="submit">Tambah Barang</button>
            </div>
        </div>

    </form>
@endsection