@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('content_settings.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="input here" aria-label="input here" name="name">
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
        </form>
    </div>
@endsection
@push('script')
    <script></script>
@endpush