@extends('template.admin')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Jadwal Kunjungan</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Jadwal Kunjungan</button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="jadwalKunjunganTable">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Lansia</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach($jadwalKunjungan as $kunjungan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kunjungan->nama_lansia }}</td>
                        <td>{{ $kunjungan->alamat }}</td>
                        <td>{{ $kunjungan->tanggal }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $kunjungan->id }}">Edit</button>
                            <form action="{{ route('jadwal.kunjungan.destroy', $kunjungan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit Jadwal Kunjungan -->
                    <div class="modal fade" id="editModal{{ $kunjungan->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kunjungan->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $kunjungan->id }}">Edit Jadwal Kunjungan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('jadwal.kunjungan.update', $kunjungan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nama_lansia{{ $kunjungan->id }}" class="form-label">Nama Lansia</label>
                                            <input type="text" id="nama_lansia{{ $kunjungan->id }}" name="nama_lansia" class="form-control" value="{{ $kunjungan->nama_lansia }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat{{ $kunjungan->id }}" class="form-label">Alamat</label>
                                            <input type="text" id="alamat{{ $kunjungan->id }}" name="alamat" class="form-control" value="{{ $kunjungan->alamat }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal{{ $kunjungan->id }}" class="form-label">Tanggal</label>
                                            <input type="date" id="tanggal{{ $kunjungan->id }}" name="tanggal" class="form-control" value="{{ $kunjungan->tanggal }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
</section>

<!-- Modal Tambah Jadwal Kunjungan -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Jadwal Kunjungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{ route('jadwal.kunjungan.store') }}" method="POST"> --}}
                    @csrf
                    <div class="mb-3">
                        <label for="nama_lansia" class="form-label">Nama Lansia</label>
                        <input type="text" id="nama_lansia" name="nama_lansia" class="form-control" placeholder="Nama Lansia">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#jadwalKunjunganTable').DataTable();
    });
</script>
@endsection
