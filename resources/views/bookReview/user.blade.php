@extends('master')

@section('title')
    {{ $user->name }} | BookReview
@endsection

@section('main')
    <!-- User Detail Start -->
    <div class="container mt-4">
        <div class="container-fluid pb-5">

            <div class="row px-xl-5 offset-1">
                <div class="col-12">
                    <h5 class="section-title position-relative mb-3">
                        <span class="bg-secondary pr-3">
                            Kullanıcı Profili
                        </span>
                    </h5>
                </div>
                <div class="col-2 mb-30">
                    <div class="user-pp text-center" data-ride="carousel">
                        <img class="user-pp shadow-4-strong " src="{{ asset($user->profile_photo_url) }}" alt="user-pp"
                            onerror="this.src='{{ asset('storage/profile-photos/default.png') }}'">
                    </div>
                </div>

                <div class="col-10 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3>{{ $user->name }}</h3>
                        <div class="about text-dark mb-2">
                            <p>{{ $user->about }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col-11 offset-1">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab"
                                href="#tab-pane-1">Değerlendirmeler ({{ count($reviews) }})</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Listeler
                                ({{ count($lists) }})</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                @foreach ($reviews as $review)
                                    <a href="{{ route('book', [$review->book->id, $review->book->title]) }}"
                                        class="text-decoration-none text-dark" title="Kitaba Git">
                                        <div class="row mb-2">
                                            <div class="col-1">
                                                <img class="book-sm" src="{{ asset($review->book->book_photo) }}"
                                                    alt="{{ $review->book->title }}"
                                                    onerror="this.src='{{ asset('storage/books/default.png') }}'">
                                            </div>
                                            <div class="col-10">
                                                <div class="title font-weight-bold text-dark">
                                                    {{ $review->book->title }}
                                                </div>
                                                <div class="author-publisher">
                                                    {{ $review->book->author->author_name ?? '' }} -
                                                    {{ $review->book->publisher->publisher_name ?? '' }}
                                                </div>
                                                <div class="rating">
                                                    <div class="text-primary">
                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                            <i class="far fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">

                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <ul>
                                    @foreach ($lists as $list)
                                        <li><a href="{{ route('list', [$list->id, $list->list_name]) }}"
                                                class="text-dark text-capitalize text-lg">{{ __($list->list_name) }}</a>
                                            <span>({{ count($list->books) }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Detail End -->
@endsection
