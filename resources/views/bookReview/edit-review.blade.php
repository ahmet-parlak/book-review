@extends('master')

@section('title')
    Değerlendirmeni Düzenle | BookReview
@endsection

@section('css')
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row px-xl-5 d-flex justify-content-center">
            <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span
                        class="bg-secondary pr-3">Değerlendirmenizi Düzenleyin</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="d-flex pb-2 border-bottom">
                        <div class="text-center mx-4">
                            <img class="book-detail" src="{{ $review->book->book_photo }}" alt="Image"
                                onerror="this.src='{{ asset('storage/books/default.png') }}'"
                                style="width: auto; height:175px">
                        </div>
                        <div class="align-self-center mx-4">
                            <h3>{{ $review->book->title }}</h3>
                            <h6><strong>Yazar: </strong>{{ $review->book->author->author_name ?? '-' }}</h6>
                            <h6><strong>Yayınevi: </strong>{{ $review->book->publisher->publisher_name }}</h6>
                            <div class="text-primary mr-2">
                                @for ($i = 0; $i < floor($review->book->rating); $i++)
                                    <small class="fas fa-star"></small>
                                @endfor
                                @if ($review->book->rating - floor($review->book->rating) == 0.5)
                                    <small class="fas fa-star-half-alt"></small>
                                @endif
                                @for ($i = 5 - ceil($review->book->rating); $i > 0; $i--)
                                    <small class="far fa-star"></small>
                                @endfor
                                <span class="text-dark text-sm ml-1">({{$review->book->review_count}})</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 my-3">
                        
                        <div class="d-flex user-select-none">
                            <p class="mb-0 mr-2">Puanınız :</p>
                            <div class="rating-area text-primary">
                                <span class="rate far fa-star" rating="1" title="beğenmedim"></span>
                                <span class="rate far fa-star" rating="2" title="fena değildi"></i></span>
                                <span class="rate far fa-star" rating="3" title="beğendim"></i></span>
                                <span class="rate far fa-star" rating="4" title="çok beğendim"></i></span>
                                <span class="rate far fa-star" rating="5" title="muhteşemdi"></i></span>
                            </div>
                        </div>
                        <form id="review-form" method="POST" action="">
                            @csrf
                            <input type="hidden" name="book" value="{{ $review->book->id }}">
                            <input class="rating" type="hidden" name="rating" value="">
                            <div class="form-group">
                                <label for="review"></label>
                                <textarea id="review" name="review" cols="30" rows="5" class="form-control" minlength="3"
                                    maxlength="100000" placeholder="Görüşlerinizi bildirin (Opsiyonel)">{{ $review->review }}</textarea>
                            </div>
                            <div class="date">
                                <p><strong>Değerlendirme Tarihi: </strong>{{ $review->created_at }} @if ($review->created_at != $review->updated_at)
                                    <span class="ml-2">(<strong>Güncelleme:</strong> {{ $review->updated_at }})</span>
                                @endif
                            </p>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Güncelle" class="btn btn-primary font-weight-bold px-3">
                                <button type="button" class="remove-review btn btn-danger px-3 ml-4" remove="{{ $review->id }}">Değerlendirmeyi Kaldır</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const remove_review_ajax_url = "{{ route('review.remove') }}",
            token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $("span[rating='{{ $review->rating }}']").trigger('click');
    </script>
@endsection
