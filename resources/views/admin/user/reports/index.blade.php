<x-app-layout>
    <x-slot name="title">
        Kullanıcı Hata Raporları
    </x-slot>

    <x-slot name="header">
        Kullanıcı Hata Raporları
    </x-slot>
    <x-slot name="breadcrumb">
        <!-- For current page -->
    </x-slot>

    <div class="m-5">
        <div class="p-4 mb-4 font-bold tracking-wide text-center text-base text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-200 dark:text-blue-800 [word-spacing:0.25em]"
            role="alert">
            Kullanıcılar <span class="text-green-700">kitaplar</span> ile ilgili<span
                class="text-indigo-600"> {{ number_format($books, 0, ',', '.') }}</span>,
                <span class="text-yellow-700">yazarlar</span> ile ilgili <span class="text-indigo-600">{{ number_format($authors, 0, ',', '.') }}</span> ve
                <span class="text-red-700">yayınevleri</span> ile ilgili <span class="text-indigo-600">{{ number_format($publishers, 0, ',', '.') }}</span> adet olmak
            üzere toplam <span
                class="text-indigo-600">{{ number_format($books + $authors + $publishers, 0, ',', '.') }}</span> hata raporu
            oluşturdu.
        </div>
        <div class="row">
            <!--Kitaplar-->
            <div class="col-lg-4 col-md-12 mb-5">

                <div class="admin-card">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('user.reports.books') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('assets/vectors/books.svg') }}" alt="books-vector"
                                    srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kitaplar
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Kullanıcıların kitaplar için
                                oluşturduğu hata raporlarını buradan inceleyebilirsiniz.</p>
                        </a>
                    </div>
                </div>
            </div>
            <!--Kitaplar-->

            <!--Yazarlar-->
            <div class="col-lg-4 col-md-12 mb-4">

                <div class="admin-card">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('user.reports.authors') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('assets/vectors/authors.svg') }}"
                                    alt="authors-vector" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Yazarlar
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Kullanıcıların yazarlar için
                                oluşturduğu hata raporlarını buradan inceleyebilirsiniz.</p>
                        </a>
                    </div>
                </div>
            </div>
            <!--Yazarlar-->

            <!--Yayınevleri-->
            <div class="col-lg-4 col-md-12 mb-5">
                <div class="admin-card">
                    <div
                        class="mx-auto p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 hover:shadow">
                        <a href="{{ route('user.reports.publishers') }}" class="card-link">
                            <!-- Icon-Start -->
                            <div class="icon mb-2">
                                <img class="mx-auto" src="{{ asset('assets/vectors/publishers.jpg') }}"
                                    style="width: 170px;" alt="publishers-vector" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Yayınevleri
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Kullanıcıların yayınevleri için
                                oluşturduğu hata raporlarını buradan inceleyebilirsiniz.</p>
                        </a>
                    </div>
                </div>
            </div>
            <!--Yayınevleri-->

        </div>
    </div>

</x-app-layout>
