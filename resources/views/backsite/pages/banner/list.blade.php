@extends('backsite.layouts.app')

@push('style')
<style></style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ url('banner/create') }}" class="btn btn-primary mb-3">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $banner->file_name }}</td>
                    <td><img src="{{ asset('storage/' . $banner->path) }}" alt="Banner Image" width="100"></td>
                    <td>{{ $banner->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td>
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $banner->id ?>">Delete</button>
                    </td>
                </tr>

                <div class="modal fade" id="deleteModal<?= $banner->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form action="{{ route('banner.delete', $banner->id) }}" method="POST">
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
@endsection

@push('script')
<script></script>
@endpush