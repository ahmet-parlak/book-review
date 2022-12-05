<x-app-layout>

    <x-slot name="title">
        Yönetim Paneli
    </x-slot>

    <x-slot name="header">
        Yönetim Paneli
    </x-slot>

    <div class="m-5">
        <div class="p-4 mb-4 font-bold tracking-wide text-center text-base text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-200 dark:text-blue-800 [word-spacing:0.25em]"
            role="alert">
            Sistemde <span class="text-indigo-600">{{ number_format($publishers, 0, ',', '.') }}</span> yayınevi ve
            <span class="text-indigo-600">{{ number_format($authors, 0, ',', '.') }}</span> yazara ait <span
                class="text-indigo-600">{{ number_format($books, 0, ',', '.') }}</span> kitap bulunuyor.
        </div>

        <div class="row offset-1">
            <!--Kitaplar-->
            <div class="col-lg-5 col-md-12 mb-5">

                <div class="admin-card">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('books.index') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('/') . 'assets/vectors/books.svg' }}"
                                    alt="books-vector" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kitaplar
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Kitap ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>
                        </a>
                    </div>
                </div>

            </div>


            <!--Kategoriler-->
            <div class="col-lg-5 col-md-12 mb-5">

                <div class="admin-card ">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('categories.index') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('/') . 'assets/vectors/tags.svg' }}"
                                    alt="categories-vector" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kategoriler
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Kategori ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>
                        </a>
                    </div>
                </div>

            </div>


            <!--Yazarlar-->
            <div class="col-lg-5 col-md-12 mb-4">

                <div class="admin-card">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('authors.index') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('/') . 'assets/vectors/authors.svg' }}"
                                    alt="authors-vector" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Yazarlar
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Yazar ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>
                        </a>
                    </div>
                </div>

            </div>


            <!--Yayınevleri-->
            <div class="col-lg-5 col-md-12 mb-5">

                <div class="admin-card">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('publishers.index') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('/') . 'assets/vectors/publishers.jpg' }}"
                                    style="width: 170px;" alt="publishers-vector" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Yayınevleri
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Yayınevi ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>
                        </a>
                    </div>
                </div>

            </div>


        </div>


    </div>

</x-app-layout>
