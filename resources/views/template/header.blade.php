    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">BOOK</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">REVIEW</span>
                </a>
            </div>

            <!-- Search -->
            <div class="col-lg-4 col-6 text-left">
                <form action="{{ route('search') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Kitap, Yazar, ISBN, Yayınevi, ..."
                            name="search" required minlength="3" autocomplete="off">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- User -->
            <div class="col-lg-4 col-6 text-right">
                @auth
                    <div class="menu">
                        <div class="d-inline mx-2 py-3 border-right">
                            <div class="d-inline text-capitalize">{{ Auth::user()->name }}</div>
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="Image"
                                class="small-pp img-fluid rounded-circle shadow-4-strong mx-1">
                        </div>
                        @if (Auth::user()->type === 'admin')
                            <a href="{{ route('dashboard') }}" class="btn btn-small btn-warning">Panel</a>
                        @endif
                        <a href="{{ route('profile.show') }}" class="btn btn-small btn-warning">Profil</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <input class="btn btn-small btn-warning" type="submit" value="Çıkış">
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-small btn-warning">Giriş Yap</a>
                    <a href="{{ route('register') }}" class="btn btn-small btn-warning">Kayıt Ol</a>
                @endauth
            </div>



        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-2">
        <div class="row px-xl-5">
            <div class="col-lg-2 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
                    href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Kategoriler</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        {{-- <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Edebiyat <i
                                    class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Roman</a>
                                <a href="" class="dropdown-item">Şiir</a>
                                <a href="" class="dropdown-item">Deneme</a>
                                <a href="" class="dropdown-item">Biyografi</a>
                                <a href="" class="dropdown-item">Öykü</a>
                                <a href="" class="dropdown-item">Diğer</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Araştırma - Tarih</a>
                        <a href="" class="nav-item nav-link">Bilim</a>
                        <a href="" class="nav-item nav-link">Akademik</a>
                        <a href="" class="nav-item nav-link">Bilgisayar</a>
                        <a href="" class="nav-item nav-link">Din - Tasavvuf</a>
                        <a href="" class="nav-item nav-link">Sanat - Tasarım</a>
                        <a href="" class="nav-item nav-link">Mizah</a>
                        <a href="" class="nav-item nav-link">Sağlık</a>
                        <a href="" class="nav-item nav-link">Felsefe - Düşünce</a>
                        <a href="" class="nav-item nav-link">Hobi</a> --}}

                        @forelse (App\Models\Category::with('childrenAll')->get() as $category)
                            @if (count($category->childrenAll) && !$category->parent_id)
                                @include('template.category', $category)
                            @else
                                @if (!$category->parent_id)
                                    <a href="{{ route('search') }}?category={{ $category->id }}"
                                        class="nav-item nav-link">{{ $category->category_name }}</a>
                                @endif
                            @endif
                        @empty
                            <a href="" class="nav-item nav-link">Kategori Bulunamadı</a>
                        @endforelse
                    </div>
                </nav>
            </div>

            <div class="col-lg-10">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="{{ route('home') }}" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-primary bg-dark border border-primary px-2">BOOK</span>
                        <span
                            class="h1 text-uppercase text-dark bg-primary border border-primary px-2 ml-n1">REVIEW</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('home') }}" class="nav-item nav-link">Ana Sayfa</a>
                            {{-- <a href="{{route('top-100')}}" class="nav-item nav-link">Top 100</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Çok Okunan
                                    <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Kitaplar</a>
                                    <a href="checkout.html" class="dropdown-item">Yazarlar</a>
                                </div>
                            </div> --}}
                            <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                        </div>
                        @auth
                            <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                <a href="{{ route('mybooks') }}" class="text-white  mx-3"><i
                                        class="fas fa-book mx-2 text-primary"></i>Kitaplarım</a>
                                {{-- <a href="{{ route('myreviews') }}" class="text-white mx-3"><i
                                        class="fas fa-star mx-2 text-primary"></i>Değerlendirmelerim</a>
                                <a href="{{ route('mylists') }}" class="text-white mx-3"><i
                                        class="fas fa-list-alt mx-2 text-primary"></i>Listelerim</a> --}}
                                {{-- <a href="" class="btn px-0">
                                    <i class="fas fa-bell text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle"
                                        style="padding-bottom: 2px;">0</span>
                                </a> --}}
                                {{-- <a href="" class="btn px-0 ml-3">
                                    <i class="fas fa-book-open text-primary"></i>
                                    <span class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px;">0</span>
                                </a> --}}

                                {{-- <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px;">0</span>
                            </a> --}}
                            </div>
                        @endauth
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- SmallScreen Start-->
    <div class="d-lg-none mb-2">
        <!-- User -->
        <div class="text-right">
            @auth
                <div class="menu">
                    <div class="d-inline">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="Image"
                            class="small-pp img-fluid rounded-circle shadow-4-strong mx-1">
                    </div>
                    @if (Auth::user()->type === 'admin')
                        <a href="{{ route('dashboard') }}" class="btn btn-small btn-warning">Panel</a>
                    @endif
                    <a href="{{ route('profile.show') }}" class="btn btn-small btn-warning">Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <input class="btn btn-small btn-warning" type="submit" value="Çıkış">
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-small btn-warning">Giriş Yap</a>
                <a href="{{ route('register') }}" class="btn btn-small btn-warning">Kayıt Ol</a>
            @endauth
        </div>

        <div class="my-2 text-left col-10 offset-1">
            <form action="{{ route('search') }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Kitap, Yazar, ISBN, Yayınevi, ..."
                        name="search" required minlength="3" autocomplete="off">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-transparent text-primary btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <!-- SmallScreen End -->
