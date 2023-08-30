@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="container">
        <a href="{{ url('content_settings/create') }}" class="btn btn-primary mb-3">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    {{-- <th scope="col">Exstra Attributes</th> --}}
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contentSettings as $dataContentSettings)
                    <tr>
                        <td>{{ $dataContentSettings->id }}</td>
                        <td>{{ $dataContentSettings->name }}</td>
                        <td>{{ $dataContentSettings->type_name }}</td>
                        {{-- <td>{{ $dataContentSettings->extra_attributes }}</td> --}}
                        <td>{{ $dataContentSettings->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
