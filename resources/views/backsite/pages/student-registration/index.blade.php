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
        <h3>Pembukaan Yang Tersedia :</h3>
        <div class="row mt-5">
            @forelse ($RegistrationSchedule as $item)
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <img class="img-fluid w-50" src="{{ asset('Logo-Ibnu-Qayyim/Logo Horizontal.png') }}" alt="">
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Judul :</h6>
                                    <p>{{ $item->title }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Tahun Ajaran :</h6>
                                    <p>{{ $item->period }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Tanggal Mulai :</h6>
                                    <p>{{ $item->start_date }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Tanggal Akhir :</h6>
                                    <p>{{ $item->end_date }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Gelombang :</h6>
                                    <p>{{ $item->batch }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Biaya Pendaftaran :</h6>
                                    <p>Rp {{ number_format($item->registration_fee,2,',','.') }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ url("student-registration-form/$item->slug") }}" class="btn btn-success ">Daftar</a>
                            </div>
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
                          <tr>
                            <td class="py-1">
                              <img src="{{ asset('PurpleAdmin') }}/assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td> Herman </td>
                            <td> Beck </td>
                            <td><label class="badge badge-success">Lulus</label></td>
                            <td>Pembukaan PPDB SMP Ibnu Qoyyim</td>
                            <td>2023/2024</td>
                            <td><button class="btn btn-success">Lihat</button></td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="{{ asset('PurpleAdmin') }}/assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td> Herman </td>
                            <td> Beck </td>
                            <td><label class="badge badge-success">Lulus</label></td>
                            <td>Pembukaan PPDB SMP Ibnu Qoyyim</td>
                            <td>2023/2024</td>
                            <td><button class="btn btn-success">Lihat</button></td>
                          </tr>
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
