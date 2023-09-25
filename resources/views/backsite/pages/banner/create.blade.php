@extends('backsite.layouts.app')

@push('style')
<style></style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Add Banner</h3>

        <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="file_name">Nama File:</label>
                <input type="text" id="file_name" name="file_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="path">Upload Gambar Banner:</label>
                <input type="file" id="path" name="path" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@push('script')

@endpush
