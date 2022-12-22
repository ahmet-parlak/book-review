@extends('master')

@section('title')
    Listelerim | BookReview
@endsection

@section('css')
@endsection

@section('main')

    <div class="">
        <div class="row mt-2 px-xl-5">

            <div class="col-lg-8 offset-2 table-responsive mb-5">
                <!-- Breadcrumb Start -->
                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb bg-light mb-30">
                                <a class="breadcrumb-item text-dark" href="{{ route('mybooks') }}">Kitaplarım</a>
                                <span class="breadcrumb-item active text-capitalize">Listelerim</span>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->
                <div class="header mb-2">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Listelerim</span></h5>
                </div>
                @if ($lists->count())
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <th>Liste</th>
                            <th>Oluşturuldu</th>
                            <th>Güncellendi</th>
                            <th>Kaldır</th>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($lists as $list)
                                <tr>
                                    <td class="align-middle">
                                        <a class="text-dark text-decoration-none"
                                            href="{{ route('mylist', $list->list_name) }}" title="Listeye Git">
                                            {!! Str::ucfirst(__($list->list_name)) !!}
                                        </a>
                                        <span class="badge badge-primary badge-pill mx-2">{{ count($list->books) }}</span>
                                    </td>
                                    <td class="align-middle"
                                        title="{{ $list->created_at ? $list->created_at->format('d.m.Y (H:i)') : '' }}">
                                        {{ $list->created_at ? $list->created_at->diffForHumans() : '' }}
                                    </td>
                                    <td class="align-middle"
                                        title="{{ $list->updated_at ? $list->updated_at->format('d.m.Y (H:i)') : '' }}">
                                        {{ $list->updated_at ? $list->updated_at->diffForHumans() : '' }}
                                    </td>
                                    <td class="align-middle">
                                        @if (!in_array($list->list_name, ['read', 'to read', 'currently reading']))
                                            <a class="remove-list fa fa-times text-xlg text-decoration-none text-danger align-middle pointer"
                                                remove="{{ $list->id }}" title="Kaldır"></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center text-lg">Henüz liste oluşturmadınız
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
            token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
