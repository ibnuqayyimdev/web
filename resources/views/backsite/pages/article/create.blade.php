@extends('backsite.layouts.app')
@push('style')
    <style></style>
@endpush
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h6>Article</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="input here" aria-label="input here" name="title">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" id="body" cols="10" rows="10"></textarea>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control form-control-lg" id="category" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Tags</label>
                                <select class="form-control form-control-lg" id="tags" name="tags[]"
                                    multiple="multiple">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control form-control-lg" id="type" name="type">
                                    @foreach ($types as $name => $value)
                                        <option value="{{ $value }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Status</label>
                                <select class="form-control form-control-lg" id="status" name="status">
                                    @foreach ($status as $key => $item)
                                        <option value="{{ $item }}" {{ $article->status == $item ? 'selected' : '' }}>{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type">Thumbnail</label>
                        <input type="file" class="form-control"  name="thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- include summernote css/js-->
    <link href="{{ asset('summernote/summernote-bs5.css') }}" rel="stylesheet">
    <link href="{{ asset('summernote/summernote-bs5.js') }}" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#body').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#tags').select2({
                placeholder: 'choose tags'
            });
        });
    </script>
@endpush
