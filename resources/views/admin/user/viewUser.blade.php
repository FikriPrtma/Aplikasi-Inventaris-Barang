@extends('components.app')
@section('sidebar')
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/user">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Pengguna
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Kehadiran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jabatan">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Jabatan
                </a>
            </li>


        </ul>

    </div>
</nav>
@endsection

@section('konten')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard User</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
        </button>
    </div>
</div>
<div> <a href="/tambah-user"><button type="button" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button></a></div>
<div class="table-responsive">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataUser as $index => $user)
            <tr>
                <td scope="col">{{ ++$index }}</td>
                <td scope="col">{{ $user->name }}</td>
                <td scope="col">{{ $user->email }}</td>
                <td scope="col">{{ $user->password }}</td>
                <td>
                    <div>
                        <a href="{{route('user.editForm',[$user->id])}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                        | <form onsubmit="return confirm('Data pengguna akan dihapus ?')" action=" {{route('user.deleteUser',$user->id)}}" method="POST" ">
                                        @csrf
                                        @method('DELETE')
                                        <button type=" submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
