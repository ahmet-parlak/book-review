@extends('master')

@section('title')
    {{ $publisher->publisher_name }} | BookReview
@endsection

@section('main')
    <!-- Book Detail Start -->
    <div class="container">
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-4 mb-30">
                    <div class="publisher-detail-img" data-ride="carousel">
                        <img class="publisher-detail" src="{{ asset($publisher->publisher_photo) }}" alt="Image"
                            onerror="this.src='{{ asset('storage/publishers/default.jpg') }}'">
                    </div>
                </div>

                <div class="col-lg-8 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3>{{ $publisher->publisher_name }}</h3>
                        {{-- <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div> --}}
                        {{-- <h5 class="font-weight-semi-bold mb-4">Yazar: <small class="font-weight-normal"><a href=""
                                    class="text-dark">{{ $book->author->author_name }}</a></small></h5>
                        <h5 class="font-weight-semi-bold mb-4">Yayınevi: <small class="font-weight-normal"><a href=""
                                    class="text-dark">{{ $book->publisher->publisher_name }}</a></small></h5> --}}

                        <div class="website text-dark mb-2">
                            <strong>Website:</strong> <a href="{{ $publisher->website }}" class="text-dark">
                                @if (!is_null($publisher->website))
                                    {{ explode("/",$publisher->website)[2] }}
                                @endif
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end pt-2">
                                <div class="d-inline-flex">
                                    @auth
                                        @if (auth()->user()->type == 'admin')
                                            <a href="{{ route('publishers.edit', $publisher->id) }}"
                                                class="text-dark px-2 align-self-center">
                                                Düzenle
                                            </a>
                                        @endif

                                        <!-- Report -->
                                        <a class="text-dark px-2 align-self-center" data-toggle="modal"
                                            data-target="#reportModal">
                                            Hata Bildir
                                        </a>
                                        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                                            aria-labelledby="reportModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="reportModalLabel">Hata Bildir</h5>
                                                        <button type="button" class="report-modal close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="report_form" class="report">
                                                            <input type="hidden" name="report_data"
                                                                value="{{ $publisher->id }}">
                                                            <div class="font-italic font-weight-bold mb-2">
                                                                Hatalı olduğunu düşündüğünüz veya yazarla ilgili eksik olan
                                                                bilgileri işaretledikten sonra
                                                                hata bildir butonuna basın.
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="publisher_name"
                                                                    class="custom-control-input report" id="publisher_name">
                                                                <label class="custom-control-label" for="publisher_name">Yayınevi
                                                                    Adı</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="publisher_photo"
                                                                    class="custom-control-input report" id="publisher_photo">
                                                                <label class="custom-control-label"
                                                                    for="publisher_photo">Fotoğrafı</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="website"
                                                                    class="custom-control-input report" id="website">
                                                                <label class="custom-control-label"
                                                                    for="website">Website</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="description"
                                                                    class="custom-control-input report" id="description">
                                                                <label class="custom-control-label"
                                                                    for="description">Açıklama</label>
                                                            </div>
                                                            <div class="checkbox-warning text-danger mb-2"
                                                                style="display: none">
                                                                Lütfen rapor etmek istediğiniz verileri işaretleyin.
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">İptal</button>
                                                        <button type="button" class="report btn btn-primary">Hata
                                                            Bildir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Report -->
                                    @endauth
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Açıklama</a>
                            {{-- <a class="nav-item nav-link text-dark active" data-toggle="tab"
                                href="#tab-pane-2">Değerlendirmeler
                                (0)</a> --}}
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <p>{{ $publisher->description }}</p>
                            </div>
                            {{-- <div class="tab-pane fade show active" id="tab-pane-2">
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="d-flex">
                                            <p class="mb-0 mr-2">Puan * :</p>
                                            <div class="text-primary">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label for="review"></label>
                                                <textarea id="review" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Değerlendir" class="btn btn-primary px-3">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="mb-4">Değerlendirmeler</h4>
                                        <div class="media mb-4">
                                            <img src="https://picsum.photos/200/300" alt="Image"
                                                class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                    ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                                    ipsum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    {{-- <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Önerilenler</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Title</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5></h5>
                                <h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Title</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5></h5>
                                <h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Title</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5></h5>
                                <h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Title</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5></h5>
                                <h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Title</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5></h5>
                                <h6 class="text-muted ml-2"><del></del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Products End -->
@endsection
@section('js')
    <script>
        const report_ajax_url = "{{ route('report.publisher') }}",
            token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection