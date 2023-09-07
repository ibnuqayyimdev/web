@extends('backsite.layouts.app')
@push('style')
<style></style>
@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="{{ url('content_settings/create') }}" class="btn btn-primary mb-3">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        {{-- <th scope="col">Exstra Attributes</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contentSettings as $dataContentSettings)
                    <tr>
                        <td>{{ $dataContentSettings->id }}</td>
                        <td>{{ $dataContentSettings->name }}</td>
                        <td>{{ $dataContentSettings->type_name }}</td>
                        {{-- <td>{{ $dataContentSettings->extra_attributes }}</td> --}}
                        <td>
                            <form action="{{ route('content_settings.update_status', $dataContentSettings->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($dataContentSettings->status)
                                <button type="submit" class="btn btn-success btn-sm">On</button>
                                @else
                                <button type="submit" class="btn btn-danger btn-sm">Off</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('content_settings.edit', $dataContentSettings->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $dataContentSettings->id ?>">Delete</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal<?= $dataContentSettings->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('content_settings.delete', $dataContentSettings->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('script')
<script></script>
@endpush