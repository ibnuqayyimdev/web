@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <img class="img-fluid w-50" src="{{ asset('Logo-Ibnu-Qayyim/Logo Horizontal.png') }}" alt="">
                    </center>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Form Pendaftaran</h4>
                    <form class="form-sample" action="{{ url('student-registration-store') }}" method="POST"
                        enctype="multipart/form-data" id="registration-form">
                        @csrf
                        <p class="card-description">Isi biodata dibawah ini dengan benar</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Depan*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $StudentRegistration->first_name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Belakang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $StudentRegistration->last_name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Umur</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="age"
                                            value="{{ $StudentRegistration->age }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="type" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-lg" id="gender" name="gender">
                                            @foreach ($genders as $val => $gender)
                                                <option value="{{ $val }}"
                                                    {{ $StudentRegistration->gender == $val ? 'selected' : '' }}>{{ $gender }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="place_of_birth"
                                            value="{{ $StudentRegistration->place_of_birth }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="day_of_birth"
                                            value="{{ $StudentRegistration->day_of_birth }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Asal Sekolah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="school_of_origin"
                                            value="{{ $StudentRegistration->school_of_origin }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun Lulus</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="year_of_graduation"
                                            value="{{ $StudentRegistration->year_of_graduation }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Orang Tua/Wali*</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $StudentRegistration->email }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone_number"
                                            value="{{ $StudentRegistration->phone_number }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Photo 4x6</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="photo" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ijasah/Surat Keterangan Lulus</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="ijasah_or_skl" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Orang Tua/Wali</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="parent_name"
                                            value="{{ $StudentRegistration->parent_name }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">KTP Orang Tua/Wali</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="ktp" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('backsite.components.indonesia_region')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kode Pos</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="zip_code"
                                            value="{{ old('zip_code') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" id="btnSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#registration-form').submit(function(e) {
            e.preventDefault();

        });
        $(document).on('click','#btnSubmit',function (e) {
            e.preventDefault();
            swal({
                title: "Apakah data anda sudah benar?",
                // text: "Silahkan cek ulang untuk memastikan data anda benar,setelah itu bisa tekan tombol ok untuk melanjutkan pendaftaran!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#btnSubmit').attr('disabled',true)
                    $('#registration-form').submit();
                }
            });
        });
    </script>
@endpush
