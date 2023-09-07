@extends('backsite.layouts.app')
@push('style')
<style></style>
@endpush
@section('content')
<div class="container">
    <form action="{{ route('content_settings.update', $contentSetting->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $contentSetting->name }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control form-control-lg" id="type" name="type">
                        @foreach ($types as $name => $value)
                        <option value="{{ $value }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push('script')
<script></script>
@endpush