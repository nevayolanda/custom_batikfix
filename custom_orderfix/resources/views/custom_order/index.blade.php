@extends('layouts.app')

@section('title', 'Custom Order')

@section('content')
<div class="page-header">
    <h1>Pesanan Custom Batik</h1>
    <p class="mb-0">Kelola pesanan custom dari pelanggan</p>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Daftar Custom Order</span>
        <a href="{{ route('custom_order.create') }}" class="btn btn-sm btn-primary">+ Pesanan Baru</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Jenis Batik</th>
                        <th>Kain</th>
                        <th>Teknik</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $item)
                        <tr>
                            <td><strong>#{{ $item->id }}</strong></td>
                            <td>{{ $item->pelanggan->nama }}</td>
                            <td>{{ $item->jenis_batik }}</td>
                            <td>{{ $item->jenis_kain }}</td>
                            <td>{{ $item->teknik }}</td>
                            <td>
                                @php
                                    $statusClass = match($item->status) {
                                        'pending' => 'badge-pending',
                                        'proses' => 'badge-proses',
                                        'selesai' => 'badge-selesai',
                                        'dibayar' => 'badge-dibayar',
                                        default => 'badge-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ ucfirst($item->status) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('custom_order.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('custom_order.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin mau hapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
