@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('category.update',$category->id) }}">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="input here" aria-label="input here" name="name" value="{{ $category->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="type">Status</label>
                    <select class="form-control form-control-lg" id="status" name="status">
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Non Active</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Description (optional)</label>
                    <input type="text" class="form-control form-control-lg @error('description') is-invalid @enderror" placeholder="input here" aria-label="input here" name="description" value="{{ $category->description }}">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
