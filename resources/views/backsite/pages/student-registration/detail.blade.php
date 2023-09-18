@extends('backsite.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Pribadi</h4>
        <div class="form-group">
            <label for="first_name">Nama Depan:</label>
            <input type="text" class="form-control" id="first_name" value="{{ $studentRegistration->first_name }}" readonly>
        </div>
        <div class="form-group">
            <label for="last_name">Nama Belakang:</label>
            <input type="text" class="form-control" id="last_name" value="{{ $studentRegistration->last_name }}" readonly>
        </div>
        <div class="form-group">
            <label for="age">Umur:</label>
            <input type="text" class="form-control" id="age" value="{{ $studentRegistration->age }} tahun" readonly>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin:</label>
            <input type="text" class="form-control" id="gender" value="{{ $studentRegistration->gender == '1' ? 'Laki-laki' : 'Perempuan' }}" readonly>
        </div>
        <div class="form-group">
            <label for="place_of_birth">Tempat Lahir:</label>
            <input type="text" class="form-control" id="place_of_birth" value="{{ $studentRegistration->place_of_birth }}" readonly>
        </div>
        <div class="form-group">
            <label for="day_of_birth">Tanggal Lahir:</label>
            <input type="text" class="form-control" id="day_of_birth" value="{{ $studentRegistration->day_of_birth }}" readonly>
        </div>
        <div class="form-group">
            <label for="school_of_origin">Asal Sekolah:</label>
            <input type="text" class="form-control" id="school_of_origin" value="{{ $studentRegistration->school_of_origin }}" readonly>
        </div>
        <div class="form-group">
            <label for="year_of_graduation">Tahun Lulus:</label>
            <input type="text" class="form-control" id="year_of_graduation" value="{{ $studentRegistration->year_of_graduation }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email Orang Tua/Wali:</label>
            <input type="text" class="form-control" id="email" value="{{ $studentRegistration->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="phone_number">Nomor HP:</label>
            <input type="text" class="form-control" id="phone_number" value="{{ $studentRegistration->phone_number }}" readonly>
        </div>
        <div class="form-group">
            <label for="parent_name">Nama Orang Tua/Wali:</label>
            <input type="text" class="form-control" id="parent_name" value="{{ $studentRegistration->parent_name }}" readonly>
        </div>

        <h4 class="card-title">Lampiran</h4>
        @foreach ($attachments as $attachment)
        <div class="form-group">
            <label for="{{ $attachment->file_name }}">{{ $attachment->file_name }}:</label>
            <a href="{{ asset('storage/' . $attachment->path) }}" target="_blank" class="form-control">Lihat Lampiran</a>
        </div>
        @endforeach

        <h4 class="card-title">Alamat</h4>
        <div class="form-group">
            <label for="province">Provinsi:</label>
            <input type="text" class="form-control" id="province" value="{{ \Indonesia::findProvince($studentRegistration->province_id)->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="cities">Kota:</label>
            <input type="text" class="form-control" id="cities" value="{{ \Indonesia::findCity($studentRegistration->city_id)->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="district">Kecamatan:</label>
            <input type="text" class="form-control" id="district" value="{{ \Indonesia::findDistrict($studentRegistration->district_id)->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="village">Desa:</label>
            <input type="text" class="form-control" id="village" value="{{ \Indonesia::findVillage($studentRegistration->village_id)->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="zip_code">Kode Pos:</label>
            <input type="text" class="form-control" id="zip_code" value="{{ $studentRegistration->zip_code }}" readonly>
        </div>
        <div class="form-group">
            <label for="address">Alamat:</label>
            <input type="text" class="form-control" id="address" value="{{ $studentRegistration->address }}" readonly>
        </div>

        <form action="{{ route('update.status', ['id' => $studentRegistration->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="status">Pilih Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $studentRegistration->status == 1 ? 'selected' : '' }}>Lulus</option>
                    <option value="2" {{ $studentRegistration->status == 2 ? 'selected' : '' }}>Revisi</option>
                    <option value="3" {{ $studentRegistration->status == 3 ? 'selected' : '' }}>Pending</option>
                    <option value="4" {{ $studentRegistration->status == 4 ? 'selected' : '' }}>Tidak Lulus</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('student-registration.list') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script>
</script>
@endpush