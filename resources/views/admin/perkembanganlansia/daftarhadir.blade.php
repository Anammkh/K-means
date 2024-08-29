@extends('template.admin')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Daftar Hadir Lansia</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Daftar Hadir</button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Lansia</th>
                        <th>Tanggal Kehadiran</th>
                        <th>Status Kehadiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftarHadir as $hadir)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hadir->lansia->nama ?? 'Tidak Ditemukan' }}</td>
                        <td>{{ $hadir->tanggal_kehadiran }}</td>
                        <td>{{ $hadir->status_kehadiran }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $hadir->id }}">Edit</button>
                            <form action="{{ route('daftarhadir.destroy', $hadir->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Tambah Daftar Hadir -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Daftar Hadir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('daftarhadir.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="lansia_id" class="form-label">Nama Lansia</label>
                        <select id="lansia_id" name="lansia_id" class="form-select" required>
                            <option value="">Pilih Lansia</option>
                            @foreach($dataLansia as $lansia)
                                <option value="{{ $lansia->id }}">{{ $lansia->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kehadiran" class="form-label">Tanggal Kehadiran</label>
                        <input type="date" id="tanggal_kehadiran" name="tanggal_kehadiran" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
                        <select id="status_kehadiran" name="status_kehadiran" class="form-select" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Daftar Hadir -->
@foreach($daftarHadir as $hadir)
<div class="modal fade" id="editModal{{ $hadir->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $hadir->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $hadir->id }}">Edit Daftar Hadir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('daftarhadir.update', $hadir->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="lansia_id" class="form-label">Nama Lansia</label>
                        <select id="lansia_id" name="lansia_id" class="form-select" required>
                            @foreach($dataLansia as $lansia)
                                <option value="{{ $lansia->id }}" {{ $hadir->lansia_id == $lansia->id ? 'selected' : '' }}>
                                    {{ $lansia->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kehadiran" class="form-label">Tanggal Kehadiran</label>
                        <input type="date" id="tanggal_kehadiran" name="tanggal_kehadiran" class="form-control" value="{{ $hadir->tanggal_kehadiran }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
                        <select id="status_kehadiran" name="status_kehadiran" class="form-select" required>
                            <option value="Hadir" {{ $hadir->status_kehadiran == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Tidak Hadir" {{ $hadir->status_kehadiran == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection
