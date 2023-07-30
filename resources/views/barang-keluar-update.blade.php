@extends('layouts/main')

@section('body')
    <form action="{{ url('/barang-keluar/update/'.$barang_keluar->id) }}" method="POST">
        @method('put')
        @csrf

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="id_barang">Nama Barang Keluar</label>
            </small>
            <br>
            <select name="id_barang" class="w-100 select2 form-select @error('id_barang') is-invalid @enderror">
                <option value="">-- Nama barang --</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}" {{ old('id_barang', $barang_keluar->id_barang) == $b->id ? "selected":"" }}>{{ $b->nama_barang }}</option>    
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
                <label for="tanggal_keluar">Tanggal Barang Keluar</label>
            </small>
            <input type="date" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" value="{{ old('tanggal_keluar', $barang_keluar->tanggal_keluar) }}">
            @error('tanggal_keluar')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group input-group-sm mb-3">
            <small class="ms-2">
                <label for="jumlah_keluar">Jumlah Barang Keluar (Bundel)</label>
            </small>
            <input type="number" name="jumlah_keluar" class="form-control @error('jumlah_keluar') is-invalid @enderror" placeholder="Jumlah barang keluar (Bundel)" value="{{ old('jumlah_keluar', $barang_keluar->jumlah_keluar) }}">
            @error('jumlah_keluar')
            <div class="invalid-feedback ms-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row">
            <div class="text-end">
                <a href="{{ url('/barang-keluar') }}" class="btn btn-dark btn-sm rounded-0">Kembali</a>
                <button class="btn btn-primary btn-sm rounded-0" type="submit">Simpan Perubahan</button>
            </div>
        </div>

    </form>
@endsection