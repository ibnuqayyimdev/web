@extends('backsite.layouts.app')
@push('style')
<style></style>
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Add Registration Schedule</h3>

        <form method="POST" action="{{ route('register-schedule.store') }}">
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="1">Open</option>
                            <option value="0">Closed</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type:</label>
                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date">
                        @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date">
                        @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="period" class="form-label">Period:</label>
                        <input type="text" class="form-control @error('period') is-invalid @enderror" id="period" name="period">
                        @error('period')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="batch" class="form-label">Batch:</label>
                        <input type="number" class="form-control @error('batch') is-invalid @enderror" id="batch" name="batch">
                        @error('batch')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="registration_fee" class="form-label">Registration Fee:</label>
                        <input type="number" class="form-control @error('registration_fee') is-invalid @enderror" id="registration_fee" name="registration_fee">
                        @error('registration_fee')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
@push('script')

@endpush