@extends('backsite.layouts.app')
@push('style')
<style></style>
@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentRegistration as $key => $registration)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
                            <td>{{ $registration->age }} tahun</td>
                            <td>{{ $registration->gender == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>
                                @if($registration->status == 1)
                                Lulus
                                @elseif($registration->status == 2)
                                Revisi
                                @elseif($registration->status == 3)
                                Pending
                                @elseif($registration->status == 4)
                                Tidak Lulus
                                @else
                                Status Tidak Valid
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($registration->created_at)->translatedFormat('d F Y') }}</td>
                            <td>
                                <a href="{{ route('student-registration.detail', $registration->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script></script>
@endpush