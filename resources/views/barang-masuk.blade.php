@extends('layouts/main')

@section('body')
    <a href="{{ url('/barang-masuk/create') }}" class="btn btn-success m-2">Tambah Barang Masuk</a>

    <table id="dt" class="table table-striped cell-border pt-2 mb-2">
        <thead class="table-dark align-middle">
            <tr>
                <th class="text-center" style="width:5%">No.</th>
                <th class="text-center" style="width:25%">Nama Barang</th>
                <th class="text-center" style="width:15%">Tanggal Masuk</th>
                <th class="text-center" style="width:15%">Jumlah Masuk (Bundel)</th>
                <th class="text-center" style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($barang_masuk as $bm)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $bm->barang->nama_barang }}</td>
                    <td class="text-center">{{ date('d/m/Y', strToTime($bm->tanggal_masuk)); }}</td>
                    <td class="text-center">{{ $bm->jumlah_masuk }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary m-1 rounded-0" href="{{ url('/barang-masuk/update/'.$bm->id) }}" title="Ubah">
                                <i class="fa fa-pencil-square-o"></i> Update
                            </a>
                            <form action="{{ url('/barang-masuk/delete/'.$bm->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger m-1 rounded-0 adelete" href="" title="Hapus">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection