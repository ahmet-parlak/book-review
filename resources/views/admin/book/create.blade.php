<x-app-layout>
    <x-slot name="title">
        Kitap Ekle | Yönetim Paneli
    </x-slot>
    <x-slot name="headScripts">

    </x-slot>
    <x-slot name="header">
        Kitap Ekle
    </x-slot>
    <x-slot name="breadcrumb">
        <!--Previous Pages-->
        <x-slot name='prev_pages'>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a href="{{ route('books.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Kitaplar</a>
                </div>
            </li>
        </x-slot>
    </x-slot>

    <div class="row">
        <div class="col-8 offset-2">
            <div class="md:grid md:grid-cols-8 md:gap-6 ">
                <div class="mt-2  md:col-span-8 md:mt-0 ">

                    <form id="book-form" action="{{ route('books.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-3 sm:p-6">
                                <!-- #Form Info -->
                                <div class="flex p-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        Ekleyeceğiniz kitabın
                                        <a class="text-yellow-600 hover:text-yellow-600 text-base"
                                            href="{{ route('authors.create') }}" title="Yazar Ekle">Yazar</a>,
                                        <a class="text-yellow-600 hover:text-yellow-600 text-base"
                                            href="{{ route('publishers.create') }}" title="Yayınevi Ekle">Yayınevi</a>
                                        ve
                                        <a class="text-yellow-600 hover:text-yellow-600 text-base"
                                            href="{{ route('categories.create') }}" title="Kategori Ekle">Kategori</a>
                                        bilgisi sisteme eklenmiş olmalıdr.
                                    </div>
                                </div>
                                <p
                                    class="tracking-normal text-gray-600 md:text-lg dark:text-gray-400 mb-0 border-b-2 pl-2">
                                    Kitap
                                    bilgilerini doldurup '<span class="text-indigo-700">Kitap Ekle</span>' butonuna
                                    basın</p>

                                <!--Form Info# -->

                                <!-- #Validation Erorrs -->
                                @if ($errors->any())
                                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 bold"
                                        role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Validation Erorrs# -->

                                <div class="isbn">
                                    <label for="isbn"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN<sup>*</sup></label>
                                    <input type="text" id="isbn" name="isbn" required autocomplete="off"
                                        value="{{ old('isbn') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="book-title">
                                    <label for="book-title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kitap
                                        Başlığı<sup>*</sup></label>
                                    <input type="text" id="book-title" name="title" required autocomplete="off"
                                        value="{{ old('title') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="author">
                                    <label for="author"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Yazar*</label>
                                    <input id="authorHidden" type="hidden" name="author_id" value="{{ old('author_id') }}">
                                    <input id="author" value="" autocomplete="off"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" list="authors"/>
                                    <datalist id="authors">
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->author_name }}" authorValue="{{ $author->id }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>

                                <div class="publisher">
                                    <label for="publisher"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <select id="publisher" name="publisher_id" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option id="parent-option" selected value="">Yayınevi<sup> *</sup>
                                        </option>
                                        @foreach ($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="publication_year">
                                    <label for="publication_year"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Yayın
                                        Yılı</label>
                                    <input type="number" id="publication_year" name="publication_year" required
                                        autocomplete="off" value="{{ old('publication_year') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="parent-category">
                                    <label for="parent"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                    <select id="parent-select" name="category_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option id="parent-option" selected value="">Kategori<sup> *</sup>
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                            @if ($category->childrenAll)
                                                @include('admin/category/components/create-category-option',
                                                    [
                                                        'categories' => $category->childrenAll,
                                                    ])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="pages">
                                    <label for="pages"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sayfa
                                        Sayısı</label>
                                    <input type="number" id="pages" name="pages" autocomplete="off"
                                        value="{{ old('pages') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="original-book-title">
                                    <label for="original-book-title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orijinal
                                        Başlık</label>
                                    <input type="text" id="original-book-title" name="original_title"
                                        autocomplete="off" value="{{ old('original_title') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="translator">
                                    <label for="translator"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Çevirmen</label>
                                    <input type="text" id="translator" name="translator"
                                        value="{{ old('translator') }}" autocomplete="off"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div>
                                    <div class="mt-2">
                                        <textarea id="description" name="description" rows="6"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Açıklama">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-base font-medium text-gray-800">Kapak Fotoğrafı
                                        Seçin</label>
                                    <div
                                        class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                        <div class="space-y-1 text-center">

                                            <div class="flex text-sm text-gray-600">

                                                <label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <div class="photo-preview text-center">
                                                        <svg class="mx-auto h-24 w-24 text-gray-400"
                                                            stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                    <p class="text-xs text-gray-500" id="photo-name">2MB'ye kadar
                                                        PNG, JPG </p>
                                                    <input id="file-upload" name="book_photo" type="file"
                                                        class="sr-only">
                                                </label>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="bg-gray-50 px-4 py-3 text-center sm:px-6">
                                <button id="submit-btn" type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Kitap
                                    Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            /* Doubleclick Prevent */
            const submitButton = document.querySelector("#submit-btn"),
                form = document.querySelector("#book-form"),
                fetchAuthorsAction = "{{ route('books.fetchauhors') }}",
                token = "{{ csrf_token() }}";
        </script>


        <script src="{{ asset('/') }}assets/js/admin/admin.js"></script>
    </x-slot>

</x-app-layout>
