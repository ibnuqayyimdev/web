@extends('backsite.layouts.app')
@push('style')
<style>
    :root {
        --red: #DC4535;
        --white: #f2edf3; 
        --green: #198754;
    }

    .red {
        background-color: var(--red);
        color: var(--white);
    }

    .ticket-card {
        padding: 10px;
        background-color:var(--green);
        color: var(--white);
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('register-schedule.create') }}" class="btn btn-primary mb-3">Add</a>
        </div>
    </div>
    <div class="row">
        @foreach($registrationSchedule as $schedule)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <center>
                        <img class="img-fluid w-50" src="{{ asset('Logo-Ibnu-Qayyim/Logo Horizontal.png') }}" alt="">
                    </center>
                </div>
                <div class="card-body py-3 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-text mb-0">{{ $schedule->title }}</h3>
                        <p class="card-text">
                            @if ($schedule->status == 1)
                            <span class="badge bg-success float-right">Buka</span>
                            @else
                            <span class="badge bg-danger float-right">Tutup</span>
                            @endif
                        </p>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Tanggal Mulai:</h6>
                            <p>{{ \Carbon\Carbon::parse($schedule->start_date)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Tanggal Akhir:</h6>
                            <p>{{ \Carbon\Carbon::parse($schedule->end_date)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tahun Ajaran:</h6>
                            <p>{{ $schedule->period }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Gelombang:</h6>
                            <p>{{ $schedule->batch }}</p>
                        </div>
                    </div>
                    <p class="card-text ticket-card text-center"><strong>Biaya Pendaftaran:</strong> Rp {{ number_format($schedule->registration_fee, 0, ',', ',') }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('register-schedule.edit', $schedule->id) }}" class="btn btn-warning btn-block">Edit</a>
                    <a href="{{ route('register-schedule.delete', $schedule->id) }}" class="btn red btn-block" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $schedule->id ?>">Delete</a>
                    <div class="modal fade" id="deleteModal<?= $schedule->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('register-schedule.delete', $schedule->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger red">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
@push('script')
<script></script>
@endpush