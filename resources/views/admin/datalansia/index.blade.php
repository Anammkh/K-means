@extends('template.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Lansia</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data Lansia</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Kemampuan Berjalan</th>
                            <th>Riwayat Penyakit</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Status Pekerjaan</th>
                            <th>Penghasilan Perbulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataLansia as $lansia)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lansia->nama }}</td>
                                <td>{{ $lansia->umur }}</td>
                                <td>{{ $lansia->kemampuan_berjalan }}</td>
                                <td>{{ $lansia->riwayat_penyakit }}</td>
                                <td>{{ $lansia->jumlah_anggota_keluarga }}</td>
                                <td>{{ $lansia->status_pekerjaan }}</td>
                                <td>Rp.{{ $lansia->penghasilan_perbulan }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $lansia->id }}">Edit</button>
                                    <form action="{{ route('data_lansia.destroy', $lansia->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit Data Lansia -->
                            <div class="modal fade" id="editModal{{ $lansia->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $lansia->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $lansia->id }}">Edit Data Lansia</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('data_lansia.update', $lansia->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="nama{{ $lansia->id }}" class="form-label">Nama</label>
                                                        <input type="text" id="nama{{ $lansia->id }}" name="nama" class="form-control" value="{{ $lansia->nama }}" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="umur{{ $lansia->id }}" class="form-label">Umur</label>
                                                        <input type="number" id="umur{{ $lansia->id }}" name="umur" class="form-control" value="{{ $lansia->umur }}" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="kemampuan_berjalan{{ $lansia->id }}" class="form-label">Kemampuan Berjalan</label>
                                                        <input type="text" id="kemampuan_berjalan{{ $lansia->id }}" name="kemampuan_berjalan" class="form-control" value="{{ $lansia->kemampuan_berjalan }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="riwayat_penyakit{{ $lansia->id }}" class="form-label">Riwayat Penyakit</label>
                                                        <input type="text" id="riwayat_penyakit{{ $lansia->id }}" name="riwayat_penyakit" class="form-control" value="{{ $lansia->riwayat_penyakit }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="jumlah_anggota_keluarga{{ $lansia->id }}" class="form-label">Jumlah Anggota Keluarga</label>
                                                        <input type="number" id="jumlah_anggota_keluarga{{ $lansia->id }}" name="jumlah_anggota_keluarga" class="form-control" value="{{ $lansia->jumlah_anggota_keluarga }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="status_pekerjaan{{ $lansia->id }}" class="form-label">Status Pekerjaan</label>
                                                        <input type="text" id="status_pekerjaan{{ $lansia->id }}" name="status_pekerjaan" class="form-control" value="{{ $lansia->status_pekerjaan }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="penghasilan_perbulan{{ $lansia->id }}" class="form-label">Penghasilan Perbulan</label>
                                                        <input type="number" id="penghasilan_perbulan{{ $lansia->id }}" name="penghasilan_perbulan" class="form-control" value="{{ $lansia->penghasilan_perbulan }}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Data Lansia -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Lansia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data_lansia.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" id="umur" name="umur" class="form-control" placeholder="Umur" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kemampuan_berjalan" class="form-label">Kemampuan Berjalan</label>
                                <input type="text" id="kemampuan_berjalan" name="kemampuan_berjalan" class="form-control" placeholder="Kemampuan Berjalan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                                <input type="text" id="riwayat_penyakit" name="riwayat_penyakit" class="form-control" placeholder="Riwayat Penyakit">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jumlah_anggota_keluarga" class="form-label">Jumlah Anggota Keluarga</label>
                                <input type="number" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga" class="form-control" placeholder="Jumlah Anggota Keluarga">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status_pekerjaan" class="form-label">Status Pekerjaan</label>
                                <input type="text" id="status_pekerjaan" name="status_pekerjaan" class="form-control" placeholder="Status Pekerjaan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penghasilan_perbulan" class="form-label">Penghasilan Perbulan</label>
                                <input type="number" id="penghasilan_perbulan" name="penghasilan_perbulan" class="form-control" placeholder="Penghasilan Perbulan">
                            </div>
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
            $('#dataTable').DataTable();
        });
    </script>
@endsection
