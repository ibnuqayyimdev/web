@extends('backsite.layouts.app')
@push('style')
<style></style>
@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="{{ url('tag/create') }}" class="btn btn-primary mb-3">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <form action="{{ route('tag.update_status', $tag->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($tag->status)
                                <button type="submit" class="btn btn-success btn-sm">On</button>
                                @else
                                <button type="submit" class="btn btn-danger btn-sm">Off</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a> | <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $tag->id ?>">Delete</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal<?= $tag->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
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
