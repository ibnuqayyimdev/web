@extends('backsite.layouts.app')
@push('style')
<style>
    .ticket-card {
        border: 2px dashed #000;
        padding: 10px;
    }
</style>
@endpush
@section('content')
<section>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Syarat Pendaftaran Ibnu Qayyim</h4>
            </div>
            <div class="card-body px-3 py-2">
                <ol>
                    <li>
                        <p>Lancar membaca Alquran</p>
                    </li>
                    <li>
                        <p>Kartu Identitas Orangtua</p>
                    </li>
                    <li>
                        <p>Fotokopi Kartu Keluarga (KK) calon siswa.</p>
                    </li>
                    <li>
                        <p>Fotokopi Akta Kelahiran calon siswa.</p>
                    </li>
                    <li>
                        <p>Dua lembar pas foto berwarna ukuran 3x4 cm terbaru.</p>
                    </li>
                    <li>
                        <p>Fotokopi Ijazah SD atau Surat Keterangan Lulus.</p>
                    </li>
                    <li>
                        <p>Fotokopi raport semester terakhir tahun ajaran terakhir.</p>
                    </li>
                    <li>
                        <p>Calon siswa dan orang tua atau wali akan diwawancarai oleh panitia penerimaan.</p>
                    </li>
                    <li>
                        <p>Biaya pendaftaran sebesar [jumlah biaya] harus dibayar pada saat pengisian formulir pendaftaran.</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <h3>Pembukaan Yang Tersedia :</h3>
        @forelse ($RegistrationSchedule as $item)
        <div class="col-md-6 mb-4 mt-3">
            <div class="card">
                <div class="card-header">
                    <center>
                        <img class="img-fluid w-50" src="{{ asset('Logo-Ibnu-Qayyim/Logo Horizontal.png') }}" alt="">
                    </center>
                </div>
                <div class="card-body py-3 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-text mb-0">{{ $item->title }}</h3>
                        <p class="card-text">
                            @if ($item->status == 1)
                            <span class="badge bg-success float-right">Buka</span>
                            @else
                            <span class="badge bg-danger float-right">Tutup</span>
                            @endif
                        </p>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Tanggal Mulai:</h6>
                            <p>{{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Tanggal Akhir:</h6>
                            <p>{{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tahun Ajaran:</h6>
                            <p>{{ $item->period }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Gelombang:</h6>
                            <p>{{ $item->batch }}</p>
                        </div>
                    </div>
                    <p class="card-text ticket-card text-center"><strong>Biaya Pendaftaran:</strong> Rp {{ number_format($item->registration_fee, 0, ',', ',') }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ url("student-registration-form/$item->slug") }}" class="btn btn-success ">Daftar</a>
                </div>
            </div>
        </div>
        @empty
        <center>
            <h6>Sedang tidak ada pembukaan!</h6>
        </center>
        @endforelse
    </div>
    <div class="col-lg-12 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pendaftaran Saya</h4>
                <p class="card-description">
                    List Pendaftaran Yang Sudah Di Submit
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> User </th>
                                <th> Nama Depan </th>
                                <th> Nama Belakang </th>
                                <th> Status Pendaftaran</th>
                                <th> Terdaftar</th>
                                <th> Tahun Ajaran</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($StudentRegistration as $item)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('PurpleAdmin') }}/assets/images/faces-clipart/pic-1.png" alt="image" />
                                    </td>
                                    <td> {{ $item->first_name }} </td>
                                    <td> {{ $item->last_name }} </td>
                                    <td>
                                        @php
                                            switch ($item->status) {
                                                case '1':
                                                    $labelClass = 'warning';
                                                    break;
                                                case '2':
                                                    $labelClass = 'danger';
                                                    break;
                                                case '3':
                                                    $labelClass = 'success';
                                                    break;
                                                default:
                                                    $labelClass = 'secondary';
                                                    break;
                                            }
                                        @endphp
                                        <label class="badge badge-{{ $labelClass}}">{{ $item->status_name }}</label>
                                    </td>
                                    <td>{{ $item->registrationSchedule->title }}</td>
                                    <td>{{ $item->registrationSchedule->period  }}</td>
                                    <td><a href="{{ url('student-registration-form-detail/'.$item->id) }}" class="btn btn-success">Lihat</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script></script>
@endpush
