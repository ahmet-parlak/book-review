@extends('master')

@section('title')
    Kitaplarım | BookReview
@endsection

@section('css')
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row mt-5 px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <div class="text-center mb-3 border-bottom">
                    <h2>KİTAPLARIM</h2>
                </div>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kitaplar</th>
                            <th>Puan</th>
                            <th>Değerlendirme</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($reviews as $review)
                            <tr>
                                <td class="align-middle">
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
                                        {{ Str::limit($review->review, 40) }}
                                    @else
                                        <a href="" class="text-dark">Değerlendir<i class="fa fa-pen ml-2"></i></a>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $review->created_at }}</td>
                                <td class="align-middle"><button class="btn btn-sm btn-warning mr-1" title="Düzenle"><i
                                            class="fa fa-pen"></i></button>
                                    <button class="remove-review btn btn-sm btn-danger" remove="{{ $review->id }}"
                                        title="Kaldır"><i class="fa fa-times text-lgr align-middle"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
