@extends('template.admin')

@section('content')
<div class="row">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-white">Selamat Datang di Dashboard Admin</h4>
            </div>
            <div class="card-body">
                <p class="lead">Ini adalah halaman admin untuk aplikasi Clustering Prioritas Pelayanan Lansia.</p>

                <h5 class="mt-4"><i class="bi bi-info-circle"></i> Tata Cara Penggunaan Aplikasi</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>1. Data Lansia:</strong> Masukkan data lansia yang akan dikelompokkan berdasarkan kriteria tertentu.
                    </li>
                    <li class="list-group-item">
                        <strong>2. Pengaturan Kriteria:</strong> Tentukan kriteria yang akan digunakan untuk melakukan clustering, seperti usia, kondisi kesehatan, dan kebutuhan pelayanan.
                    </li>
                    <li class="list-group-item">
                        <strong>3. Pilih Metode Clustering:</strong> Pilih metode K-means elbow untuk melakukan clustering pada data lansia.
                    </li>
                    <li class="list-group-item">
                        <strong>4. Proses Clustering:</strong> Jalankan proses clustering untuk mengelompokkan lansia ke dalam kelompok yang berbeda berdasarkan prioritas pelayanan.
                    </li>
                    <li class="list-group-item">
                        <strong>5. Analisis Hasil:</strong> Tinjau hasil clustering untuk melihat kelompok mana yang memerlukan prioritas pelayanan lebih tinggi.
                    </li>
                    <li class="list-group-item">
                        <strong>6. Pemberian Pelayanan:</strong> Gunakan hasil clustering untuk menentukan prioritas pemberian pelayanan kepada kelompok lansia yang membutuhkan.
                    </li>
                </ul>

                <p class="mt-3 text-muted">Pastikan Anda mengikuti langkah-langkah di atas untuk mengoptimalkan penggunaan aplikasi ini dalam membantu memprioritaskan pelayanan bagi lansia.</p>
            </div>
        </div>
    </div>
@endsection
