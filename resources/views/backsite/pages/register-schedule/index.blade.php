@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <section>
        <h3>Pembukaan Yang Tersedia :</h3>
        <div class="row mt-5">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <img class="img-fluid w-50" src="{{ asset('Logo-Ibnu-Qayyim/Logo Horizontal.png') }}" alt="">
                    </div>
                    <div class="card-body">
                        {{-- <h4 class="card-title">Pembukaan</h4>
              <p class="card-description"> Basic form layout </p> --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td>Judul</td>
                                    <td>: Pembukaan PPDB SMP Ibnu Qoyyim</td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajaran</td>
                                    <td>:2023/2024</td>
                                </tr>
                                <tr>
                                    <td>Gelombang</td>
                                    <td>: 1</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai</td>
                                    <td>: 01 Oktober 2023</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Akhir</td>
                                    <td>: 31 Oktober 2023</td>
                                </tr>
                                <tr>
                                    <td>Biaya Pendaftaran</td>
                                    <td>: Rp.200.000</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a href="" class="btn btn-success">Daftar</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
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
                        </tbody>
                      </table><table class="table table-striped">
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
