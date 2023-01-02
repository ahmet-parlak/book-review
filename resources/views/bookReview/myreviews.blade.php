@extends('master')

@section('title')
    Değerlendirmelerim | BookReview
@endsection

@section('css')
@endsection

@section('main')
    <div class="">
        <div class="row px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <!-- Breadcrumb Start -->
                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb bg-light mb-30">
                                <a class="breadcrumb-item text-dark" href="{{ route('mybooks') }}">Kitaplarım</a>
                                <span class="breadcrumb-item active text-capitalize">Değerlendirmelerim</span>
                            </nav>
                        </div>
                    </div>
                <!-- Breadcrumb End -->

                @if ($reviews->count())
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="6" class="text-uppercase h5">Değerlendirmelerim</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($reviews as $review)
                                <tr>
                                    <td class="align-middle">
                                        <a class="text-dark text-decoration-none"
                                            href="{{ route('book', [$review->book->id, Str::slug($review->book->title)]) }}"
                                            title="Kitaba Git">
                                            <div class="row">
                                                <div class="col-2"><img src="{{ $review->book->book_photo }}"
                                                        alt="{{ $review->book->title }}" style="width: 50px;"
                                                        onerror="this.src='{{ asset('storage/books/default.png') }}'"></div>
                                                <div class="col-10">
                                                    <p class="title mb-0">
                                                        <strong>{{ Str::limit($review->book->title, 40) }}</strong>
                                                    </p>
                                                    <p class="author mb-0">
                                                        {{ Str::limit($review->book->author->author_name ?? '-', 40) }}
                                                    </p>
                                                    <p class="publisher mb-0">
                                                        <small>{{ Str::limit($review->book->publisher->publisher_name, 50) }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto text-warning" style="width: 100px;">
                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        @if (strlen($review->review) > 0)
                                            {{ Str::limit($review->review, 30) }}
                                        @else
                                            <a href="{{ route('review.edit', [$review->id, Str::slug($review->book->title)]) }}#review"
                                                class="text-dark">Bir değerlendirme yazın<i class="fa fa-pen ml-2"></i></a>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="created-date font-italic"
                                            title="{{ $review->created_at->format('d.m.Y - H.i') }}">
                                            {{ $review->created_at->diffForHumans() }}</div>
                                        @if ($review->created_at != $review->updated_at)
                                            <div class="updated-date font-italic"
                                                title="(Güncellendi) {{ $review->updated_at->format('d.m.Y - H.i') }}">
                                                <small>({{ $review->updated_at->diffForHumans() }})</small>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        {{-- <select name="list" id="list">
                                            <option value="read">Okudum</option>
                                            <option value="currently-reading">Okuyorum</option>
                                            <option value="to-read">Okuyacağım</option>
                                        </select> --}}
                                    </td>
                                    <td class="align-middle"><a
                                            class="fas fa-edit text-dark text-decoration-none text-xlg align-middle mr-2"
                                            href="{{ route('review.edit', [$review->id, Str::slug($review->book->title)]) }}"
                                            title="Düzenle"></a>
                                        <a class="remove-review fa fa-times text-xlg text-decoration-none text-danger align-middle pointer"
                                            remove="{{ $review->id }}" title="Kaldır"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="col-8 offset-2 alert alert-warning text-center text-lg font-weight-bold">Henüz bir değerlendirme yapmadınız
                    </div>
                @endif

                <div class="col-12 d-flex justify-content-center mt-3">
                    {{ $reviews->links('vendor.pagination.bootstrap-4') }}
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
@endsection
