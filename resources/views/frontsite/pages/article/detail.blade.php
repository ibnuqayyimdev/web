@extends('frontsite.layouts.app')
@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container " style="margin-top: 5rem;" data-aos="fade-up">


          <div class="row mt-5">
            <div class="col-md-8 my-5">
                <div class="container card p-5">
                    <article>
                        <!-- Article Header -->
                        <header>
                            <h1 class="mb-3">{{ $article->title }}</h1>
                            <div class="d-flex align-items-center mb-3">
                                <span class="text-muted me-2">{{ $article->created_at->format('d M Y') }}</span>
                                @foreach ($article->tags as $key => $tag)
                                <span class="badge  me-2 {{ $key % 2 == 0 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </header>

                        <!-- Article Image -->
                        <img src="{{ asset('storage/'.$article->thumbnail) }}" class="img-fluid mb-4" alt="Article Image">

                        <!-- Article Content -->
                        <section>
                            <p>{!! $article->body !!}</p>
                            <!-- ... add more paragraphs, images, lists, etc. -->
                        </section>

                        <!-- Article Footer (optional) -->
                        <footer class="mt-5">
                            <p>Created By: <span class="badge bg-primary">@ {{ $article->user->name }}</span></p>
                        </footer>
                    </article>
                </div>
            </div>
            <div class="col-md-4 my-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Artikel Lainnya</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid me-4" src="{{ asset('storage/'.$article->thumbnail) }}" alt="" style="width: 100px;">
                            <div class="">
                                <h6><a href="">Test judul 1</a></h6>
                                <div class="d-flex align-items-center mb-3">

                                    @foreach ($article->tags as $key => $tag)
                                    <span class="badge me-2 {{ $key % 2 == 0 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid me-4" src="{{ asset('storage/'.$article->thumbnail) }}" alt="" style="width: 100px;">
                            <div class="">
                                <h6><a href="">Test judul 2</a></h6>
                                <div class="d-flex align-items-center mb-3">

                                    @foreach ($article->tags as $key => $tag)
                                    <span class="badge me-2 {{ $key % 2 == 0 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid me-4" src="{{ asset('storage/'.$article->thumbnail) }}" alt="" style="width: 100px;">
                            <div class="">
                                <h6><a href="">Test judul 3</a></h6>
                                <div class="d-flex align-items-center mb-3">

                                    @foreach ($article->tags as $key => $tag)
                                    <span class="badge me-2 {{ $key % 2 == 0 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Kategori</h5>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Berita</div>
                                Content for list item
                              </div>
                              <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Tutorial</div>
                                Content for list item
                              </div>
                              <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Artikel</div>
                                Content for list item
                              </div>
                              <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                          </ol>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            @foreach ($article->tags as $key => $tag)
                            <span class="badge me-2 {{ $key % 2 == 0 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
</main>
@endsection

