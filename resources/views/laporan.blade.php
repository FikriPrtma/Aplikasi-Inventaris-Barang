@extends('layouts/main')

@section('body')
    <table id="dt" class="table table-striped cell-border pt-2 mb-2">
        <thead class="table-dark align-middle">
            <tr>
                <th class="text-center" style="width:5%">No.</th>
                <th class="text-center" style="width:20%">Nama Barang</th>
                <th class="text-center" style="width:20%">Jumlah Masuk</th>
                <th class="text-center" style="width:20%">Jumlah Keluar</th>
                <th class="text-center" style="width:20%">Sisa Barang</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($laporan as $l)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $l->nama_barang }}</td>
                    <td>{{ $l->bm }}</td>
                    <td>{{ $l->bk }}</td>
                    <td>{{ $l->sisa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection