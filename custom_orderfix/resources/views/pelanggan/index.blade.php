@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="page-header">
    <h1>Manajemen Pelanggan</h1>
    <p class="mb-0">Kelola data pelanggan dengan mudah</p>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Pelanggan</span>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-primary">+ Tambah Pelanggan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggan as $item)
                        <tr>
                            <td><strong>#{{ $item->id_pelanggan }}</strong></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ Str::limit($item->alamat, 50) }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('pelanggan.show', $item->id_pelanggan) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data pelanggan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
