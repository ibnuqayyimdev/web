@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="container">
        <form action="{{ route('content_settings.update', $contentSetting->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $contentSetting->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                    value="{{ $contentSetting->type }}">
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="extra_attributes" class="form-label">Extra Attributes</label>
                <input type="text" class="form-control" id="extra_attributes" name="extra_attributes">
            </div> --}}
            <div class="mb-3">
                <label for="status" class="form-label">Status</label><br>
                <input type="checkbox" class="form-check-input" id="status" name="status" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
