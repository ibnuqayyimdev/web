@extends('backsite.layouts.app')
@push('style')
<style></style>
@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="{{ url('article/create') }}" class="btn btn-primary mb-3">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Thumnail</th>
                        <th scope="col">User</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$article->thumbnail) }}" alt="" class="img-fluid">
                        </td>
                        <td>{{ $article->user->name }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <form action="{{ route('article.update_status', $article->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($article->status)
                                <button type="submit" class="btn btn-success btn-sm">On</button>
                                @else
                                <button type="submit" class="btn btn-danger btn-sm">Off</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary btn-sm">Edit</a> | <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $article->id ?>">Delete</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal<?= $article->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('article.destroy', $article->id) }}" method="POST">
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
