@extends('layouts/main')

@section('body')
    <form action="{{ url('/barang-masuk/update/'.$barang_masuk->id) }}" method="POST">
        @method('put')
        @csrf

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="id_barang">Nama Barang Masuk</label>
            </small>
            <br>
            <select name="id_barang" class="w-100 select2 form-select @error('id_barang') is-invalid @enderror">
                <option value="">-- Nama barang --</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}" {{ old('id_barang', $barang_masuk->id_barang) == $b->id ? "selected":"" }}>{{ $b->nama_barang }}</option>    
                @endforeach
            </select>
            @error('id_barang')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="tanggal_masuk">Tanggal Barang Masuk</label>
            </small>
            <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk', $barang_masuk->tanggal_masuk) }}">
            @error('tanggal_masuk')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="jumlah_masuk">Jumlah Barang Masuk (Bundel)</label>
            </small>
            <input type="number" name="jumlah_masuk" class="form-control @error('jumlah_masuk') is-invalid @enderror" placeholder="Jumlah barang masuk (Bundel)" value="{{ old('jumlah_masuk', $barang_masuk->jumlah_masuk) }}">
            @error('jumlah_masuk')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="text-end">
                <a href="{{ url('/barang-masuk') }}" class="btn btn-dark btn-sm rounded-0">Kembali</a>
                <button class="btn btn-primary btn-sm rounded-0" type="submit">Simpan Perubahan</button>
            </div>
        </div>

    </form>
@endsection