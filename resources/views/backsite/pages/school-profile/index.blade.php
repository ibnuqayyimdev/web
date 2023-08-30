@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Sekolah</h4>
                    <form class="form-sample" action="{{ url('profile-sekolah-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">form</p>
                        <div class="my-5">
                            <center>
                                <img class="img-fluid w-25 rounded rounded-full" src="{{ isset($SchoolProfile->photo) ? asset('storage/'.$SchoolProfile->photo) : ''}}" alt="">
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Sekolah*</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="school_name" value="{{ isset($SchoolProfile->name) ? $SchoolProfile->name : ''}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NPSN</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="npsn" value="{{ isset($SchoolProfile->npsn) ? $SchoolProfile->npsn : ''}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email*</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" value="{{ isset($SchoolProfile->email) ? $SchoolProfile->email : ''}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" value="{{ isset($SchoolProfile->phone) ? $SchoolProfile->phone : ''}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fax</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="fax" value="{{ isset($SchoolProfile->fax) ? $SchoolProfile->fax : ''}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address" value="{{ isset($SchoolProfile->address) ? $SchoolProfile->address : ''}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">About</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="about">{{ isset($SchoolProfile->about) ? $SchoolProfile->about : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="photo"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Visi</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="vision">{{ isset($SchoolProfile->vision) ? $SchoolProfile->vision : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Misi</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="mission">{{ isset($SchoolProfile->mission) ? $SchoolProfile->mission : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Latitude</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="latitude" value="{{ isset($SchoolProfile->latitude) ? $SchoolProfile->latitude : ''}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Longitude</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="longitude" value="{{ isset($SchoolProfile->longitude) ? $SchoolProfile->longitude : ''}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
