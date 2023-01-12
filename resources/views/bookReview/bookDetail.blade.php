@extends('master')

@section('title')
    {{ $book->title }} | BookReview
@endsection

@section('main')
    <!-- Book Detail Start -->
    <div class="container">
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-4 mb-30">
                    <div class="book-detail-img" data-ride="carousel">
                        <img class="book-detail" src="{{ $book->book_photo }}" alt="Image"
                            onerror="this.src='{{ asset('storage/books/default.png') }}'">
                    </div>
                </div>

                <div class="col-lg-8 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3>{{ $book->title }}</h3>
                        <!-- Book Rating -->
                        <div class="d-flex mb-3 user-select-none">
                            <div class="text-primary mr-2">
                                @for ($i = 0; $i < floor($book->rating); $i++)
                                    <small class="fas fa-star"></small>
                                @endfor
                                @if ($book->rating - floor($book->rating) == 0.5)
                                    <small class="fas fa-star-half-alt"></small>
                                @endif
                                @for ($i = 5 - ceil($book->rating); $i > 0; $i--)
                                    <small class="far fa-star"></small>
                                @endfor
                            </div>
                            <small class="pt-1">({{ $book->review_count }} Değerlendirme)</small>
                        </div>
                        <!-- Book Rating -->
                        {{-- <h5 class="font-weight-semi-bold mb-4">Yazar: <small class="font-weight-normal"><a href=""
                                    class="text-dark">{{ $book->author->author_name }}</a></small></h5>
                        <h5 class="font-weight-semi-bold mb-4">Yayınevi: <small class="font-weight-normal"><a href=""
                                    class="text-dark">{{ $book->publisher->publisher_name }}</a></small></h5> --}}

                        <div class="author text-dark mb-2">
                            @if (!is_null($book->author))
                                <strong>Yazar:</strong> <a
                                    href="{{ route('author', [$book->author, Str::slug($book->author->author_name)]) }}"
                                    class="text-dark">

                                    {{ $book->author->author_name }}

                                </a>
                            @endif
                        </div>
                        <div class="publisher text-dark mb-2">
                            <strong>Yayınevi:</strong> <a
                                href="{{ route('publisher', [$book->publisher, Str::slug($book->publisher->publisher_name)]) }}"
                                class="text-dark">{{ $book->publisher->publisher_name }}</a>
                        </div>
                        <div class="publisher text-dark mb-2">
                            <strong>Kategori:</strong>
                            @foreach ($book->categories as $category)
                                @if (!is_null($category->category))
                                    <a href="" class="text-dark mr-1">
                                        {{ $category->category->category_name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <div class="publisher text-dark mb-2">
                            <strong>Yayın Yılı:</strong> {{ $book->publication_year }}
                        </div>
                        <div class="isbn text-dark mb-2">
                            <strong>ISBN:</strong> {{ $book->isbn }}
                        </div>
                        <div class="publisher text-dark mb-2">
                            <strong>Dil:</strong> {!! __($book->language) !!}
                        </div>
                        <div class="pages text-dark mb-2">
                            <strong>Sayfa Sayısı:</strong> {{ $book->pages }}
                        </div>
                        @if ($book->original_title)
                            <div class="original-title text-dark mb-2">
                                <strong>Özgün Ad:</strong> {{ $book->original_title }}
                            </div>
                        @endif
                        @if ($book->translator)
                            <div class="author text-dark mb-2">
                                <strong>Çevirmen:</strong> {{ $book->translator }}
                            </div>
                        @endif
                        <div class="row">
                            @auth
                                <!-- Add to List -->
                                <div class="col-8 d-flex pt-2">
                                    <div>
                                        <div class="d-inline-flex">
                                            <select name="add-to-list" book="{{ $book->id }}"
                                                class="select-list custom-select text-capitalize" style="width: 225px">
                                                <option value="null">Listeye Ekle</option>
                                                @foreach ($lists as $list)
                                                    <option value="{{ $list->id }}" class="">
                                                        {{ __($list->list_name) }}</option>
                                                @endforeach
                                                <option value="create-list">Yeni Liste Oluştur</option>
                                            </select>
                                        </div>
                                        <div class="form-input d-none my-2">
                                            <input class="list-name form-control" name="list_name" type="text"
                                                autocomplete="off" placeholder="Liste Adı">
                                        </div>
                                    </div>
                                    <a
                                        class="d-none add-to-list text-decoration-none align-self-center mx-4 btn-sm btn-warning px-3 text-uppercase">Ekle</a>
                                </div>
                            @endauth
                        </div>
                        <div class="col-12 d-flex justify-content-end pt-2">
                            <div class="d-inline-flex">
                                @auth
                                    @if (auth()->user()->type == 'admin')
                                        <a href="{{ route('books.edit', $book->id) }}"
                                            class="text-dark px-2 align-self-center">
                                            Düzenle
                                        </a>
                                    @endif

                                    <!-- Report -->
                                    <a class="text-dark px-2 align-self-center" data-toggle="modal" data-target="#reportModal">
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
                                                        <input type="hidden" name="report_data" value="{{ $book->id }}">
                                                        <div class="font-italic font-weight-bold mb-2">
                                                            Hatalı olduğunu düşündüğünüz veya kitapla ilgili eksik olan
                                                            bilgileri işaretledikten sonra
                                                            hata bildir butonuna basın.
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="title"
                                                                class="custom-control-input book-report" id="title">
                                                            <label class="custom-control-label" for="title">Kitap
                                                                Başlığı</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="isbn"
                                                                class="custom-control-input book-report" id="isbn">
                                                            <label class="custom-control-label" for="isbn">ISBN</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="book_photo"
                                                                class="custom-control-input book-report" id="photo">
                                                            <label class="custom-control-label" for="photo">Kitap
                                                                Fotoğrafı</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="author"
                                                                class="custom-control-input book-report" id="author">
                                                            <label class="custom-control-label" for="author">Yazar</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="publisher"
                                                                class="custom-control-input book-report" id="publisher">
                                                            <label class="custom-control-label"
                                                                for="publisher">Yayınevi</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="publication_year"
                                                                class="custom-control-input book-report"
                                                                id="publication_year">
                                                            <label class="custom-control-label" for="publication_year">Yayın
                                                                Yılı</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="category"
                                                                class="custom-control-input book-report" id="category">
                                                            <label class="custom-control-label"
                                                                for="category">Kategori</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="language"
                                                                class="custom-control-input book-report" id="language">
                                                            <label class="custom-control-label" for="language">Kitap
                                                                Dili</label>
                                                        </div>

                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="pages"
                                                                class="custom-control-input book-report" id="pages">
                                                            <label class="custom-control-label" for="pages">Sayfa
                                                                Sayısı</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="description"
                                                                class="custom-control-input book-report" id="description">
                                                            <label class="custom-control-label" for="description">Kitap
                                                                Açıklaması</label>
                                                        </div>
                                                        <div class="checkbox-warning text-danger mb-2" style="display: none">
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
            <div id="reviews" class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-1">Açıklama</a>
                            <a class="nav-item nav-link text-dark active" data-toggle="tab"
                                href="#tab-pane-2">Değerlendirmeler
                                ({{ $book->review_count }})</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab-pane-1">
                                <p>{{ $book->description }}</p>
                            </div>
                            <div class="tab-pane fade show active" id="tab-pane-2">
                                <div class="row">
                                    <!-- Review -->
                                    @if (!$book->user_review)
                                        <div class="col-md-12 mb-5">
                                            <div class="d-flex user-select-none">
                                                <p class="mb-0 mr-2">Puan * :</p>
                                                <div class="rating-area text-primary">
                                                    <span class="rate far fa-star" rating="1"
                                                        title="beğenmedim"></span>
                                                    <span class="rate far fa-star" rating="2"
                                                        title="fena değildi"></i></span>
                                                    <span class="rate far fa-star" rating="3"
                                                        title="beğendim"></i></span>
                                                    <span class="rate far fa-star" rating="4"
                                                        title="çok beğendim"></i></span>
                                                    <span class="rate far fa-star" rating="5"
                                                        title="muhteşemdi"></i></span>
                                                    <span
                                                        class="clear-rating text-dark ml-2 d-none"><small>Temizle</small></span>
                                                </div>
                                            </div>
                                            <form id="review-form" method="POST" action="">
                                                @csrf
                                                <input type="hidden" name="book" value="{{ $book->id }}">
                                                <input class="rating" type="hidden" name="rating" value="">
                                                <div class="form-group">
                                                    <label for="review"></label>
                                                    <textarea id="review" name="review" cols="30" rows="5" class="form-control" minlength="3"
                                                        maxlength="100000" placeholder="Görüşlerinizi bildirin (Opsiyonel)"></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    @auth
                                                        <input type="submit" value="Değerlendir"
                                                            class="btn btn-primary px-3">
                                                    @else
                                                        <input type="submit" value="Değerlendir"
                                                            class="btn btn-primary px-3" disabled>
                                                        <span class="ml-2"><small>Değerlendirmek için lütfen <a
                                                                    href="{{ route('login') }}">giriş yapın</a>.</span>
                                                    @endauth

                                                </div>
                                            </form>
                                        </div>
                                    @endif


                                    <!-- Reviews -->
                                    <div class="col-md-12">
                                        {{-- User Review --}}
                                        @if ($book->user_review)
                                            <div id="review" class="border pt-3 px-3 mb-4">
                                                <div class="mb-3 border-bottom">
                                                    <h5>Değerlendirmeniz <a class="text-dark"
                                                            href="{{ route('review.edit', [$book->user_review->id, Str::slug($book->title)]) }}"><span
                                                                class="edit-review ml-5 fas fa-edit"
                                                                title="Düzenle"></span></a></h5>
                                                </div>
                                                <div class="media mb-4">
                                                    <img src="{{ auth()->user()->profile_photo_url }}" alt="Image"
                                                        class="small-pp img-fluid mr-3 mt-1 rounded-circle shadow-4-strong">
                                                    <div class="media-body">
                                                        <h6>{{ auth()->user()->name }}
                                                            <small> -
                                                                <i>{{ $book->user_review->created_at->diffForHumans() }}
                                                                    ({{ $book->user_review->created_at->format('d.m.Y - H.i') }})</i>
                                                                @if ($book->user_review->created_at != $book->user_review->updated_at)
                                                                    <strong class="ml-2">Güncellendi:</strong>
                                                                    <i>{{ $book->user_review->updated_at->diffForHumans() }}
                                                                        ({{ $book->user_review->updated_at->format('d.m.Y - H.i') }})</i>
                                                                @endif
                                                            </small>
                                                        </h6>
                                                        <div class="text-primary mb-2">
                                                            @for ($i = 0; $i < $book->user_review->rating; $i++)
                                                                <i class="fas fa-star"></i>
                                                            @endfor
                                                            @for ($i = 0; $i < 5 - $book->user_review->rating; $i++)
                                                                <i class="far fa-star"></i>
                                                            @endfor
                                                        </div>
                                                        <p>{{ $book->user_review->review }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <h4 class="mb-4">Değerlendirmeler</h4>
                                        @foreach ($book->reviews as $review)
                                            <div class="media mb-4">
                                                <a href="{{ route('user', [$review->user->id, $review->user->name]) }}">
                                                    <img src="{{ $review->user->profile_photo_url }}" alt="Image"
                                                        class="small-pp img-fluid mr-3 mt-1 rounded-circle shadow-4-strong"
                                                        onerror="this.src='{{ asset('storage/books/default.png') }}'"></a>
                                                <div class="media-body">
                                                    <h6><a href="{{ route('user', [$review->user->id, $review->user->name]) }}"
                                                            class="text-dark">{{ $review->user->name }}</a><small>
                                                            -
                                                            <i
                                                                title="{{ $review->created_at->format('d.m.Y') }}">{{ $review->created_at->diffForHumans() }}</i>
                                                            @if ($review->created_at != $review->updated_at)
                                                                <i title="{{ $review->updated_at->format('d.m.Y') }}">(Güncellendi:
                                                                    {{ $review->updated_at->diffForHumans() }})</i>
                                                            @endif
                                                        </small>
                                                    </h6>
                                                    <div class="text-primary mb-2">
                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                            <i class="far fa-star"></i>
                                                        @endfor
                                                    </div>
                                                    <p>{{ $review->review }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
                            <img class="img-fluid w-100" src="" alt="">
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
                            <img class="img-fluid w-100" src="" alt="">
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
                            <img class="img-fluid w-100" src="" alt="">
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
                            <img class="img-fluid w-100" src="" alt="">
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
                            <img class="img-fluid w-100" src="" alt="">
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
        const add_to_list_ajax_url = "{{ route('mylist.add.book') }}",
            report_ajax_url = "{{ route('report.book') }}",
            token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
