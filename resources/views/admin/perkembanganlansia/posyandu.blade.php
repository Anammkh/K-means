@extends('template.admin')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Posyandu</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data</button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Lansia</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Lingkar Pinggang</th>
                        <th>Tekanan Darah</th>
                        <th>Gula Darah</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataposyandu as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->lansia ? $item->lansia->nama : 'Tidak Diketahui' }}</td>
                            <td>{{ $item->tinggi_badan }}</td>
                            <td>{{ $item->berat_badan }}</td>
                            <td>{{ $item->lingkar_pinggang }}</td>
                            <td>{{ $item->tekanan_darah }}</td>
                            <td>{{ $item->gula_darah }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                <form action="{{ route('posyandu.destroy', $item->id) }}" method="POST" style="display:inline;">
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posyandu.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lansia_id" class="form-label">Nama Lansia</label>
                                <select id="lansia_id" name="lansia_id" class="form-control" required>
                                    @foreach($datalansia as $lansia)
                                        <option value="{{ $lansia->id }}">{{ $lansia->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="berat_badan" class="form-label">Berat Badan</label>
                                <input type="number" id="berat_badan" name="berat_badan" class="form-control" placeholder="Berat Badan" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lingkar_pinggang" class="form-label">Lingkar Pinggang</label>
                                <input type="number" id="lingkar_pinggang" name="lingkar_pinggang" class="form-control" placeholder="Lingkar Pinggang" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
                                <input type="text" id="tekanan_darah" name="tekanan_darah" class="form-control" placeholder="Tekanan Darah" required>
                            </div>
                            <div class="mb-3">
                                <label for="gula_darah" class="form-label">Gula Darah</label>
                                <input type="text" id="gula_darah" name="gula_darah" class="form-control" placeholder="Gula Darah" required>
                            </div>
                            <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan</label>
                                <textarea id="keluhan" name="keluhan" class="form-control" rows="3" placeholder="Keluhan (optional)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
@foreach($dataposyandu as $item)
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posyandu.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lansia_id" class="form-label">Nama Lansia</label>
                                    <select id="lansia_id" name="lansia_id" class="form-control" required>
                                        @foreach($datalansia as $lansia)
                                            <option value="{{ $lansia->id }}" {{ $item->lansia_id == $lansia->id ? 'selected' : '' }}>{{ $lansia->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                    <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" value="{{ $item->tinggi_badan }}" placeholder="Tinggi Badan" step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="berat_badan" class="form-label">Berat Badan</label>
                                    <input type="number" id="berat_badan" name="berat_badan" class="form-control" value="{{ $item->berat_badan }}" placeholder="Berat Badan" step="0.01" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lingkar_pinggang" class="form-label">Lingkar Pinggang</label>
                                    <input type="number" id="lingkar_pinggang" name="lingkar_pinggang" class="form-control" value="{{ $item->lingkar_pinggang }}" placeholder="Lingkar Pinggang" step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
                                    <input type="text" id="tekanan_darah" name="tekanan_darah" class="form-control" value="{{ $item->tekanan_darah }}" placeholder="Tekanan Darah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gula_darah" class="form-label">Gula Darah</label>
                                    <input type="text" id="gula_darah" name="gula_darah" class="form-control" value="{{ $item->gula_darah }}" placeholder="Gula Darah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <textarea id="keluhan" name="keluhan" class="form-control" rows="3" placeholder="Keluhan (optional)">{{ $item->keluhan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
