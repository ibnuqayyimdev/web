@extends('frontsite.layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="2000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('Logo-Ibnu-Qayyim/Banner.png') }})">
          <div class="container">
            <h2>SMP <span>Ibnu Qayyim</span></h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia culpa ad praesentium fugit ex maxime iste fugiat provident quam dolores? Officiis omnis ipsum similique hic. Eligendi vel ipsa ipsam asperiores eveniet! Ducimus dignissimos ipsum repellat, quidem nulla officiis mollitia unde.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('medicio/assets/img/slide/slide-2.jpg') }})">
          <div class="container">
            <h2>Muraja'ah</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('medicio/assets/img/slide/slide-3.jpg') }})">
          <div class="container">
            <h2>Lorem, ipsum dolor.</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
</section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    @if (isset($featureServiceSection->status) && $featureServiceSection->status)
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="fa-solid fa-school"></i></div>
                <h4 class="title"><a href="">Tempat Belajar Yang Nyaman</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h4 class="title"><a href="">Lulus Minimal 15 Juz</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="fa-solid fa-book-quran"></i></div>
                <h4 class="title"><a href="">Belajar Tahfiz & Tahsin</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="fas fa-dna"></i></div>
                <h4 class="title"><a href="">Bisa Bahasa Arab</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
              </div>
            </div>

          </div>

        </div>
    </section>
    @endif
    <!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    @if (isset($ctaSection->status) && $ctaSection->status)
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

          <div class="text-center">
            <h3>Cari Sekolah Sekaligus Ingin Jadi Hafiz Qur'an?</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a class="cta-btn scrollto" href="{{ route('register') }}">Daftar Sekarang</a>
          </div>

        </div>
    </section>
    @endif
    <!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    @if (isset($aboutSection->status) && $aboutSection->status)
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About Us</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
              <img src="{{ asset('Logo-Ibnu-Qayyim/Logo Mockup (2).jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>
          </div>

        </div>
    </section>
    @endif
    <!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    @if (isset($countSection->status) && $countSection->status)
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

          <div class="row no-gutters">

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="fas fa-users"></i>
                <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>

                <p><strong>Doctors</strong> consequuntur quae qui deca rode</p>
                <a href="#">Find out more &raquo;</a>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Departments</strong> adipisci atque cum quia aut numquam delectus</p>
                <a href="#">Find out more &raquo;</a>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="fas fa-flask"></i>
                <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Research Lab</strong> aut commodi quaerat. Aliquam ratione</p>
                <a href="#">Find out more &raquo;</a>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="fas fa-award"></i>
                <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Awards</strong> rerum asperiores dolor molestiae doloribu</p>
                <a href="#">Find out more &raquo;</a>
              </div>
            </div>

          </div>

        </div>
    </section>
    @endif
    <!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    @if (isset($featureSection->status) && $featureSection->status)
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
              <div class="icon-box mt-5 mt-lg-0">
                <i class="bx bx-receipt"></i>
                <h4>Est labore ad</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-cube-alt"></i>
                <h4>Harum esse qui</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-images"></i>
                <h4>Aut occaecati</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-shield"></i>
                <h4>Beatae veritatis</h4>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
              </div>
            </div>
            <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("{{ asset('medicio/assets/img/slide/slide-2.jpg') }}");' data-aos="zoom-in"></div>
          </div>

        </div>
    </section>
    @endif
    <!-- End Features Section -->

    <!-- ======= Fasility Section ======= -->
    @if (isset($fasilitySection->status) && $fasilitySection->status)
    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Fasilitas & Pendidikan</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
            <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon"><i class="fa-solid fa-kaaba"></i></div>
                <h4 class="title"><a href="">Bahasa Arab</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon"><i class="fa-solid fa-book-quran"></i></div>
                <h4 class="title"><a href="">Hafiz Qur'an</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon"><i class="fa-solid fa-mosque"></i></div>
                <h4 class="title"><a href="">Mushola</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon"><i class="fa-solid fa-baseball-bat-ball"></i></div>
                <h4 class="title"><a href="">Tempat Olaharaga</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon"><i class="fas fa-wheelchair"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
            <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon"><i class="fas fa-notes-medical"></i></div>
                <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
            </div>

        </div>
    </section>
    @endif
    <!-- End Fasility Section -->

    <!-- ======= Activity Section ======= -->
    @if (isset($activitySection->status) && $activitySection->status)
    <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Kegiatan Siswa</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <h4>Membaca Al-Qur'an</h4>
                    <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <h4>Sholat Dhuha</h4>
                    <p>Voluptas vel esse repudiandae quo excepturi.</p>
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <h4>Muraja'ah Al-Qur'an</h4>
                    <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                    <h4>Mendengarkan Ceramah</h4>
                    <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                    </a>
                </li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                    <h3>Membaca Al-Qur'an</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <img src="{{ asset('medicio/assets/img/baca-quran.jpg') }}" alt="" class="img-fluid">
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                </div>
                <div class="tab-pane" id="tab-2">
                    <h3>Sholat Dhuha</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <img src="{{ asset('medicio/assets/img/sholat-berjamaah.jpg') }}" alt="" class="img-fluid">
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                </div>
                <div class="tab-pane" id="tab-3">
                    <h3>Muraja'ah Al-Qur'an</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <img src="{{ asset('medicio/assets/img/murojoah-alquran.jpg') }}" alt="" class="img-fluid">
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                </div>
                <div class="tab-pane" id="tab-4">
                    <h3>Mendengarkan Ceramah</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <img src="{{ asset('medicio/assets/img/slide/slide-2.jpg') }}" alt="" class="img-fluid">
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                </div>
                </div>
            </div>
            </div>

        </div>
    </section>
    @endif
    <!-- End Activity Section -->

    <!-- ======= Testimonials Section ======= -->
    @if (isset($testimonialSection->status) && $testimonialSection->status)
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Testimonials</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo 2.png') }}" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                </div>
                </div>
                <!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo 2.png') }}" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>
                </div>
                <!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-item">
                    <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo 2.png') }}" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>
                </div>
                <!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    @endif
    <!-- End Testimonials Section -->

    <!-- ======= Teacher Section ======= -->
    @if (isset($teacherSection->status) && $teacherSection->status)
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Guru</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo Ibnul Qoyyim.jpg') }}" class="img-fluid" alt="">
                    <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Medical Officer</span>
                </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="300">
                <div class="member-img">
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo Ibnul Qoyyim.jpg') }}" class="img-fluid" alt="">
                    <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>William Anderson</h4>
                    <span>Cardiology</span>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo Ibnul Qoyyim.jpg') }}" class="img-fluid" alt="">
                    <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Medical Officer</span>
                </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="300">
                <div class="member-img">
                    <img src="{{ asset('Logo-Ibnu-Qayyim/Logo Ibnul Qoyyim.jpg') }}" class="img-fluid" alt="">
                    <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>William Anderson</h4>
                    <span>Cardiology</span>
                </div>
                </div>
            </div>

            </div>

        </div>
    </section>
    @endif
    <!-- End Teacher Section -->

    <!-- ======= Gallery Section ======= -->
    @if (isset($gallerySection->status) && $gallerySection->status)
    <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Gallery</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><a class="gallery-lightbox" href="{{ asset('medicio/assets/img/gallery/gallery') }}-1.jpg"><img src="{{ asset('medicio/assets/img/gallery/gallery') }}-1.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="gallery-lightbox" href="{{ asset('medicio/assets/img/gallery/gallery') }}-2.jpg"><img src="{{ asset('medicio/assets/img/gallery/gallery') }}-2.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="gallery-lightbox" href="{{ asset('medicio/assets/img/gallery/gallery') }}-3.jpg"><img src="{{ asset('medicio/assets/img/gallery/gallery') }}-3.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="gallery-lightbox" href="{{ asset('medicio/assets/img/gallery/gallery') }}-1.jpg"><img src="{{ asset('medicio/assets/img/gallery/gallery') }}-1.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="gallery-lightbox" href="{{ asset('medicio/assets/img/gallery/gallery') }}-2.jpg"><img src="{{ asset('medicio/assets/img/gallery/gallery') }}-2.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="gallery-lightbox" href="{{ asset('medicio/assets/img/gallery/gallery') }}-3.jpg"><img src="{{ asset('medicio/assets/img/gallery/gallery') }}-3.jpg" class="img-fluid" alt=""></a></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section>
    @endif
    <!-- End Gallery Section -->

    <!-- ======= Article Section ======= -->
    @if (isset($teacherSection->status) && $teacherSection->status)
    <section id="doctors" class="doctors section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Artikel</h2>
            {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
            </div>

            <div class="row">
                @foreach ($articles as $article)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <a href="{{ url('detail-article/'.$article->slug) }}">
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
                <h6><a href="{{ url('articles') }}">Lebih banyak..</a></h6>
            </div>
        </div>
    </section>
    @endif
    <!-- End Article Section -->

    <!-- ======= Frequently Asked Questioins Section ======= -->
    @if (isset($faqSection->status) && $faqSection->status)
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Frequently Asked Questioins</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <ul class="faq-list">

            <li>
              <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </p>
              </div>
            </li>

          </ul>

        </div>
    </section>
    @endif
    <!-- End Frequently Asked Questioins Section -->

    <!-- ======= Contact Section ======= -->
    @if (isset($contactSection->status) && $contactSection->status)
    <section id="contact" class="contact">
        <div class="container">

          <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

        </div>

        <div>
          {{-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> --}}
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.575300665459!2d106.90556009999999!3d-6.187545500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f512988c921d%3A0x891f82894ce7853c!2sSMP%20Islam%20Ibnu%20Qoyyim!5e0!3m2!1sid!2sid!4v1693122915867!5m2!1sid!2sid" style="border:0;width: 100%; height: 350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container">

          <div class="row mt-5">

            <div class="col-lg-6">

              <div class="row">
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@example.com<br>contact@example.com</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>

          </div>

        </div>
    </section>
    @endif
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->
@endsection
