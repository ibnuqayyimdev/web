@extends('frontsite.layouts.app')
@section('content')
    <main id="main">
        <section id="about" class="about">
            <div class="container " style="margin-top: 5rem;" data-aos="fade-up">


                <div class="row mt-5">
                    <section id="doctors" class="doctors section-bg">
                        <div class="container" data-aos="fade-up">

                            <div class="section-title">
                            <h2>Artikel</h2>
                            {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                            </div>

                            <div class="row">
                                @foreach ($articles as $article)
                                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                        <a href="{{ url('article-show/'.$article->slug) }}">
                                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                                <div class="member-img">
                                                    <img src="{{ asset('storage/'.$article->thumbnail) }}" class="img-fluid" alt=""  style="width: 300px; height: 250px;">
                                                    <div class="social">
                                                    {{-- <a href=""><i class="bi bi-twitter"></i></a>
                                                    <a href=""><i class="bi bi-facebook"></i></a>
                                                    <a href=""><i class="bi bi-instagram"></i></a>
                                                    <a href=""><i class="bi bi-linkedin"></i></a> --}}
                                                    <p>Lihat <i class="bi bi-eyes"></i></p>
                                                    </div>
                                                </div>
                                                <div class="member-info">
                                                    <div class="d-flex align-items-center mb-3">
                                                        @foreach ($article->tags as $key => $tag)
                                                        <span class="badge me-2 {{ $key % 2 == 0 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $tag->name }}</span>
                                                        @endforeach
                                                    </div>
                                                    <h4>{{ $article->title }}</h4>
                                                    <span>{{ $article->body }}</span>
                                                </div>
                                                <div class="member-footer">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="section-title">
                                {{ $articles->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </section>
    </main>
@endsection
