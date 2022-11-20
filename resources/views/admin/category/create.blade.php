<x-app-layout>
    <x-slot name="title">
        Kategori Ekle | Yönetim Paneli
    </x-slot>
    <x-slot name="headScripts">

    </x-slot>
    <x-slot name="header">
        Kategori Ekle
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
                    <a href="{{ route('categories.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Kategoriler</a>
                </div>
            </li>


        </x-slot>
    </x-slot>

    <div class="row">
        <div class="col-8 offset-2">
            <div class="md:grid md:grid-cols-8 md:gap-6 ">
                <div class="mt-5  md:col-span-8 md:mt-0 ">

                    <form id="category-form" action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-3 sm:p-6">
                                <!-- #Form Info -->
                                <p
                                    class="tracking-normal text-gray-600 md:text-lg dark:text-gray-400 mb-0 border-b-2 pl-2">
                                    Kategori
                                    bilgilerini doldurup '<span class="text-indigo-700">Kategori Ekle</span>' butonuna
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

                                <div class="category-name">
                                    <label for="category-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                        Adı<sup>*</sup></label>
                                    <input type="text" id="category-name" name="category_name" required
                                        autocomplete="off"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="parent-category">
                                    <label for="parent"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Üst
                                        Kategori</label>
                                    <select id="parent-select" name="parent_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option id="parent-option" selected value="">Yok</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @if ($category->childrenAll)
                                                @include('admin/category/components/create-category-option', [
                                                    'categories' => $category->childrenAll,
                                                ])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <div class="mt-2">
                                        <textarea id="description" name="description" rows="6"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Açıklama">{{ old('description') }}</textarea>
                                    </div>
                                </div>



                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-center sm:px-6">
                                <button id="submit-btn" type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Kategori
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
                form = document.querySelector("#author-form");
        </script>


        <script src="{{ asset('/') }}assets/js/admin/admin.js"></script>
    </x-slot>

</x-app-layout>
