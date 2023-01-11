@extends('master')

@section('title')
    {!! Str::ucfirst(__($list->list_name)) !!} | BookReview
@endsection

@section('css')
@endsection

@section('main')
    <div class="">
        <div class="row mt-5 px-xl-5">
            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <!-- Breadcrumb Start -->
                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb bg-light mb-30">
                                <a class="breadcrumb-item text-dark"
                                    href="{{ route('user', [$list->user->id, $list->user->name]) }}">{{ $list->user->name }}</a>
                                <span class="breadcrumb-item text-capitalize text-dark">Listeler</span>
                                <span class="breadcrumb-item active text-capitalize">{!! __($list->list_name) !!}</span>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <div class="header mb-2">
                    <h5 class="section-title position-relative mb-3">
                        <span class="bg-secondary pr-3 text-lg">
                            <span class="text-capitalize mx-2">{{ $list->user->name }}</span> adlı kullanıcının
                            <span class="text-capitalize font-italic mx-2"><u>{!! __($list->list_name) !!}</u></span> listesi
                        </span>
                    </h5>
                </div>
                @if ($list->books->count())
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <tbody class="align-middle">
                            @foreach ($list->books as $data)
                                @php
                                    $book = $data->book;
                                @endphp
                                <tr>
                                    <td class="align-middle">
                                        <a class="text-dark text-decoration-none"
                                            href="{{ route('book', [$book->id, Str::slug($book->title)]) }}"
                                            title="Kitaba Git">
                                            <div class="row">
                                                <div class="col-2"><img src="{{ $book->book_photo }}"
                                                        alt="{{ $book->title }}" style="width: 50px;"
                                                        onerror="this.src='{{ asset('storage/books/default.png') }}'"></div>
                                                <div class="col-10">
                                                    <p class="title mb-0">
                                                        <strong>{{ Str::limit($book->title, 40) }}</strong>
                                                    </p>
                                                    <p class="author mb-0">
                                                        {{ Str::limit($book->author->author_name ?? '-', 40) }}
                                                    </p>
                                                    <p class="publisher mb-0">
                                                        <small>{{ Str::limit($book->publisher->publisher_name, 50) }}</small>
                                                    </p>
                                                </div>
                                            </div>

                                        </a>
                                    </td>
                                    {{-- <td class="align-middle text-center">
                                        @isset($book->user_review)
                                            <a href="{{ route('review.edit', [$book->user_review->id, Str::slug($book->title)]) }}"
                                                class="text-decoration-none text-dark" title="Değerlendirmeye Git">
                                                <div class="text-primary">
                                                    @for ($i = 0; $i < $book->user_review->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 5 - $book->user_review->rating; $i++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>
                                                <small class="pt-1">(Kullanıcı Puanı)</small>
                                            </a>
                                        @endisset
                                    </td> --}}
                                    <td class="align-middle">
                                        <a href="{{ route('book', [$book->id, Str::slug($book->title)]) }}#reviews"
                                            class="text-decoration-none text-dark" title="Değerlendirmelere Git">
                                            <div class="d-flex justify-content-center user-select-none">
                                                <div class="text-primary mr-2">
                                                    @for ($i = 0; $i < floor($book->rating); $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @if ($book->rating - floor($book->rating) == 0.5)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @endif
                                                    @for ($i = 5 - ceil($book->rating); $i > 0; $i--)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <small class="pt-1">({{ $book->review_count }}
                                                Değerlendirme)</small>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center text-lg">Bu listede henüz kitap bulunmuyor.
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
