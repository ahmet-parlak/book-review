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
                                <a class="breadcrumb-item text-dark" href="{{ route('mybooks') }}">Kitaplarım</a>
                                <a class="breadcrumb-item text-dark" href="{{ route('mylists') }}">Listelerim</a>
                                <span class="breadcrumb-item active text-capitalize">{!! __($list->list_name) !!}</span>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <div class="header mb-2">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">
                            @if (!in_array($list->list_name, ['read', 'to read', 'currently reading']))
                                <i class="edit-list-name fa fa-edit mr-2 text-shadow-1" title="Başlığı düzenle"></i>
                            @endif
                            {!! __($list->list_name) !!}
                        </span> </h5>
                    <div class="jumbotron px-4 pt-4 pb-3 mb-2">
                        <div class="row">
                            <div class="col-10">
                                <form id="list-edit-form" list="{{ $list->id }}">
                                    @if (!in_array($list->list_name, ['read', 'to read', 'currently reading']))
                                        <div class="form-group d-flex mb-1">
                                            <div class="col-6 px-0">
                                                <input type="text" class="form-control edit-list-name"
                                                    placeholder="Liste Başlığı" style="display:none">
                                            </div>
                                            <a
                                                class="btn-sm btn-primary align-self-center text-dark col-form-label ml-3 d-none edit-list-name-apply font-weight-bold mx-4">Uygula</a>
                                        </div>
                                    @endif
                                    <div class="form-group d-flex align-middle mb-0">
                                        <div class="col-6 px-0">
                                            <select class="custom-select form-control" id="listState">
                                                <option value="private" @selected($list->status == 'private')>Gizli</option>
                                                <option value="public" @selected($list->status == 'public')>Herkese Açık</option>
                                            </select>
                                        </div>
                                        <a
                                            class="btn-sm btn-primary col-form-label ml-3 d-none apply-list-state text-center align-self-center font-weight-bold text-dark">Uygula</a>
                                    </div>
                                    <p class="my-0 py-0 px-1">Profilinizi ziyaret eden kişiler herkese açık listelerinizi
                                        görebilir.</p>

                                </form>
                            </div>
                            <div class="col-2 align-self-center">
                                <div class="text-right">
                                    @if (!in_array($list->list_name, ['read', 'to read', 'currently reading']))
                                        <a class="remove-list btn btn-danger" remove="{{ $list->id }}">Listeyi
                                            Kaldır</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <td class="align-middle text-center">
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
                                                <small class="pt-1">(Puanınız)</small>
                                            </a>
                                        @endisset
                                    </td>
                                    <td class="align-middle" title="{{ $data->created_at->format('d.m.Y (H:i)') }}">
                                        {{ $data->created_at->diffForHumans() }}
                                    </td>
                                    <td class="align-middle">
                                        <a class="remove-book-from-list fa fa-times text-xlg text-decoration-none text-danger align-middle pointer"
                                            remove="{{ $book->id }}" title="Kaldır"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center text-lg">Bu listeye henüz kitap eklemediniz.
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const edit_list_name_ajax_url = "{{ route('mylist.edit.name') }}",
            edit_list_state_ajax_url = "{{ route('mylist.edit.state') }}",
            remove_book_from_list_ajax_url = "{{ route('mylist.remove.book') }}",
            delete_list_ajax_url = "{{ route('mylist.delete.list') }}",
            token = "{{ csrf_token() }}",
            mylists_url = "{{ route('mylists') }}";
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
