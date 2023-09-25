@extends('backsite.layouts.app')

@push('style')
<style></style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Edit Banner</h3>

        <form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="file_name">Nama File:</label>
                <input type="text" id="file_name" name="file_name" class="form-control" value="{{ $banner->file_name }}" required>
            </div>

            <div class="form-group">
                <label for="current_image">Gambar Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $banner->path) }}" alt="Current Banner Image" width="100">
            </div>

            <div class="form-group">
                <label for="path">Upload Gambar Banner:</label>
                <input type="file" id="path" name="path" class="form-control" accept="image/*">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

@push('script')

@endpush
