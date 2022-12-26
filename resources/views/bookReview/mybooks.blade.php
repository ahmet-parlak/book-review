@extends('master')

@section('title')
    Kitaplarım | BookReview
@endsection

@section('css')
@endsection

@section('main')
    <div class="">
        <div class="row mt-5 px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <div class="text-center mb-3 border-bottom">
                    <h2>KİTAPLARIM</h2>
                </div>
                <div class="row">
                    <!-- My Lists -->
                    <div class="col-lg-6">
                        @if ($book_lists->count())
                            <table class="table table-light table-borderless table-hover text-center mb-0">
                                <thead class="thead-dark" >

                                    <tr style="border-bottom:0">
                                        <th colspan="3">
                                            <a href="{{ route('mylists') }}" class="text-white user-select-none"><i
                                                    class="fas fa-list-alt mx-2" title="Listelerime Git"></i>Listelerim </a>
                                        </th>
                                    </tr>

                                </thead>
                            </table>
                            <ul class="list-group list-group-flush user-select-none">
                                @foreach ($book_lists as $list)
                                    <li class="list-group-item d-flex align-items-center text-capitalize">
                                        <a href="{{ route('mylist',[$list->id, $list->list_name]) }}" class="text-dark"
                                            title="Listeye Git">{!! __($list->list_name) !!}
                                        </a>
                                        <span class="badge badge-primary badge-pill mx-2">{{ count($list->books) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            @if ($book_lists->count() > 4)
                                <a href="{{ route('mylists') }}" class="btn btn-dark w-100">Tümünü Gör</a>
                            @endif
                        @endif
                    </div>

                    <!-- My-Reviews -->

                    <div class="col-lg-6">
                        <table class="table table-light table-borderless table-hover text-center  mb-0">
                            <thead class="thead-dark">
                                <tr style="border-bottom:0">
                                    <th colspan="3">
                                        <a href="{{ route('myreviews') }}" class="text-white user-select-none"><i
                                                class="fas fa-star mx-2"></i>Değerlendirmelerim</a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="align-middle">
                                @if ($reviews->count())
                                    @foreach ($reviews as $review)
                                        <tr style="border-bottom-width: 1px;">
                                            <td class="align-middle">
                                                <a class="text-dark"
                                                    href="{{ route('book', [$review->book->id, Str::slug($review->book->title)]) }}"
                                                    title="Kitaba Git">
                                                    <div class="row">
                                                        <div class="col-2"><img src="{{ $review->book->book_photo }}"
                                                                alt="{{ $review->book->title }}"
                                                                style="width: 50px; height:70px"
                                                                onerror="this.src='{{ asset('storage/books/default.png') }}'">
                                                        </div>
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
                                                <div class="input-group quantity mx-auto text-warning"
                                                    style="width: 100px;">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <div class="alert alert-dark my-2" role="alert">
                                                Henüz değerlendirme yapmadınız.
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>

                        @if ($reviews->count())
                            <a href="{{ route('myreviews') }}" class="btn btn-dark w-100"
                                style="border-top-width: 1px;">Tümünü
                                Gör</a>
                        @endif
                    </div>

                </div>
                {{-- <div class="row">
                    <div class="col-lg-6"><a href="{{ route('mylists') }}" class="btn btn-dark w-100">Tümünü Gör</a></div>
                    <div class="col-lg-6"><a href="{{ route('myreviews') }}" class="btn btn-dark w-100">Tümünü Gör</a></div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
