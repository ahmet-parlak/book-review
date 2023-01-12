@extends('master')

@section('main')
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <!-- <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;"> -->
                            <img class="position-absolute w-100 h-100"
                                src="https://i.cnnturk.com/i/cnnturk/75/0x555/53e4aa14f630990824a48f81"
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Çok
                                        Okunanlar</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">En çok puanlanan ve
                                        değerlendirilen kitaplar</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Git</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100"
                                src="https://media.istockphoto.com/vectors/heart-shaped-book-shelf-with-colorful-books-heart-of-knowledge-vector-id475120264?k=20&m=475120264&s=170667a&w=0&h=nfBQ_-hqt6WB-5eWKW6xcyDuw8AIklQbd5SSm1VIgfc="
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        Yüksek
                                        Puanlılar</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">En yüksek puana
                                        sahip
                                        kitaplar</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Git</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="https://images7.alphacoders.com/451/451791.jpg"
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                        Yeni
                                        Çıkanlar</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Yeni yayınlanan
                                        kitaplar</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                        href="#">Git</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="https://www.learningliftoff.com/wp-content/uploads/2014/04/ClassicBooks.jpg"
                        alt="">
                    <div class="offer-text">
                        <!-- <h6 class="text-white text-uppercase">Save 20%</h6> -->
                        <h3 class="text-white mb-3">Klasikler</h3>
                        <a href="" class="btn btn-primary">Git</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid"
                        src="https://gobookmart.com/wp-content/uploads/2021/12/10-famous-authors-born-in-the-month-of-February.jpg"
                        alt="">
                    <div class="offer-text">
                        <!-- <h6 class="text-white text-uppercase">Save 20%</h6> -->
                        <h3 class="text-white mb-3">Çok Okunan Yazarlar</h3>
                        <a href="" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-star text-primary m-0 mr-5"></h1>
                    <h5 class="font-weight-semi-bold m-0 text-center">Puanla</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-pen text-primary m-0 mr-5"></h1>
                    <h5 class="font-weight-semi-bold m-0">Değerlendir</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-search text-primary m-0 mr-5"></h1>
                    <h5 class="font-weight-semi-bold m-0">Keşfet</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-bookmark text-primary m-0 mr-5"></h1>
                    <h5 class="font-weight-semi-bold m-0">Listeler Oluştur</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    {{-- <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Trend
                Kategoriler</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid"
                                src="https://cdn.akakce.com/-/dune-ciltli-kutu-set-6-kitap-takim-frank-herbert-x.jpg"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Roman</h6>
                            <small class="text-body">100+ Kitap</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid"
                                src="https://p4.wallpaperbetter.com/wallpaper/947/145/203/antique-book-encyclopedia-glasses-wallpaper-preview.jpg"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Bilim</h6>
                            <small class="text-body">100+ Kitap</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid"
                                src="https://c0.wallpaperflare.com/preview/774/1005/120/books-hat-magister-study.jpg"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Akademik</h6>
                            <small class="text-body">100+ Kitap</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid"
                                src="https://c4.wallpaperflare.com/wallpaper/504/398/329/historical-books-wallpaper-preview.jpg"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Tarih</h6>
                            <small class="text-body">100+ Kitap</small>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div> --}}
    <!-- Categories End -->


    <!-- Trends Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Trend
                Kitaplar</span></h2>
        <div class="row px-xl-5">
            @foreach ($trendBooks as $data)
                @php
                    $book = $data->book;
                @endphp
                <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="home-book img-fluid w-100" src="{{ asset($book->book_photo) }}"
                                alt="{{ Str::limit($book->title, 10) }}">
                            <div class="product-action">
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square"
                                    href="{{ route('book', [$book->id, $book->title]) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h5 text-decoration-none text-truncate"
                                href="{{ route('book', [$book->id, $book->title]) }}">{{ Str::limit($book->title, 20) }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h6>{{ Str::limit($book->author->author_name ?? '-', 20) }}</h6>
                            </div>
                            <div class="text-md">
                                {{ Str::limit($book->publisher->publisher_name, 20) }}
                            </div>
                            <!-- Book Rating -->
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                @for ($i = 0; $i < floor($book->rating); $i++)
                                    <small class="fa fa-star text-primary mr-1"></small>
                                @endfor
                                @if ($book->rating - floor($book->rating) == 0.5)
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                @endif
                                @for ($i = 5 - ceil($book->rating); $i > 0; $i--)
                                    <small class="far fa-star text-primary mr-1"></small>
                                @endfor
                                <small>({{ $book->review_count }})</small>
                            </div>
                            <!-- Book Rating -->
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <!-- Trends End -->

    <!-- New Books Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Yeni
                Eklenenler</span></h2>
        <div class="row px-xl-5">
            @foreach ($newBooks as $book)
                <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="home-book img-fluid w-100" src="{{ asset($book->book_photo) }}"
                                alt="{{ Str::limit($book->title, 10) }}">
                            <div class="product-action">
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a> -->
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="far fa-heart"></i></a>
                                <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a> -->
                                <a class="btn btn-outline-dark btn-square"
                                    href="{{ route('book', [$book->id, $book->title]) }}"><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h5 text-decoration-none text-truncate"
                                href="{{ route('book', [$book->id, $book->title]) }}">{{ Str::limit($book->title, 20) }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h6>{{ Str::limit($book->author->author_name ?? '-', 20) }}</h6>
                            </div>
                            <div class="text-md">
                                {{ Str::limit($book->publisher->publisher_name, 20) }}
                            </div>
                            <!-- Book Rating -->
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                @for ($i = 0; $i < floor($book->rating); $i++)
                                    <small class="fa fa-star text-primary mr-1"></small>
                                @endfor
                                @if ($book->rating - floor($book->rating) == 0.5)
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                @endif
                                @for ($i = 5 - ceil($book->rating); $i > 0; $i--)
                                    <small class="far fa-star text-primary mr-1"></small>
                                @endfor
                                <small>({{ $book->review_count }})</small>
                            </div>
                            <!-- Book Rating -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- New Books End -->
@endsection
