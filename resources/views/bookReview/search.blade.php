@extends('master')

@section('title')
    {{ request()->input('search') }} için arama sonuçları | BookReview
@endsection

@section('main')
    <!-- Breadcrumb Start -->
    {{--  <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div> --}}
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Publisher Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span
                        class="bg-secondary pr-3">Yayınevi</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="publisher-all">
                            <label class="custom-control-label" for="publisher-all">Tüm Yayınevleri</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="publisher-1">
                            <label class="custom-control-label" for="publisher-1">Test</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>

                    </form>
                </div>
                <!-- Publisher End -->

                <!-- Author Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Yazar</span>
                </h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="author-all">
                            <label class="custom-control-label" for="author-all">Tüm yazarlar</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="author-1">
                            <label class="custom-control-label" for="author-1">Test</label>
                            <span class="badge border font-weight-normal"></span>
                        </div>

                    </form>
                </div>
                <!-- Color End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <!-- Sorting Start -->
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                {{-- <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button> --}}

                                <p>{{ request()->input('search') }} ile ilgili {{ $books->total() }} sonuç bulundu.</p>
                                <p></p>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Sırala</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">En son</a>
                                        <a class="dropdown-item" href="#">Popülerlik</a>
                                        <a class="dropdown-item" href="#">Puan</a>
                                    </div>
                                </div>
                                {{-- <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                        data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Sorting End -->

                    <!-- Item Start -->
                    @foreach ($books as $book)
                        <div class="col-lg-2 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="book-search-img img-fluid w-100" src="{{ $book->book_photo }}"
                                        alt="{{ $book->title }}"
                                        onerror="this.src='{{ asset('storage/books/default.png') }}'">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="" title="Puanla"><i
                                                class="fa fa-star"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="" title="Değerlendir"><i
                                                class="fa fa-pen"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="" title="Favorilere Ekle"><i
                                                class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square"
                                            href="{{ route('book', [$book->id, Str::slug($book->title)]) }}"
                                            title="Görüntüle"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none"
                                        href="{{ route('book', [$book->id, Str::slug($book->title)]) }}"
                                        title="{{ $book->title }}">{{ Str::limit($book->title, '18', '...') }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        @isset($book->author)
                                            <p title="{{ $book->author->author_name }}">
                                                {{ Str::limit($book->author->author_name, '23', '...') }}
                                            </p>
                                        @else
                                            <p>-</p>
                                        @endisset
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
                    @endforeach
                    <!-- Item End -->

                    <!-- Pagination Start -->
                    <div class="col-12 d-flex justify-content-center">
                        {{ $books->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <!-- Pagination End -->

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
