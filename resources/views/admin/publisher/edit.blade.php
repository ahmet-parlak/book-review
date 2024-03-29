<x-app-layout>
    <x-slot name="title">
        Yayınevi Düzenle | Yönetim Paneli
    </x-slot>
    <x-slot name="headScripts">

    </x-slot>
    <x-slot name="header">
        Yayınevi Düzenle
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
                    <a href="{{ route('publishers.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Yayınevleri</a>
                </div>
            </li>
        </x-slot>
    </x-slot>

    <div class="row">
        <div class="col-8 offset-2">
            <div class="md:grid md:grid-cols-8 md:gap-6 ">
                <div class="mt-3  md:col-span-8 md:mt-0 ">

                    <!-- Header -->
                    <div class="header text-center border-bottom">
                        <h4 class="text-2xl font-bold dark:text-white">{{ $publisher->publisher_name }}</h4>
                    </div>

                    <form id="edit-form" action="{{ route('publishers.update', $publisher->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-3 sm:p-6">
                                <!-- #Form Info -->
                                <div class="px-4 py-2 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300"
                                    role="alert">
                                    Yayınevi bilgilerini düzenleyip '<span class="text-indigo-700">Değişiklikleri
                                        Kaydet</span>' butonuna basın.
                                </div>

                                <!--Form Info# -->

                                <!-- #Validation Erorrs -->
                                @if ($errors->any())
                                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Validation Erorrs# -->

                                <!-- Inputs -->
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Yayınevi:</span>
                                    <input type="text" name="publisher_name" id="publisher" autocomplete="off"
                                        required value="{{ $publisher->publisher_name }}"
                                        class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="">
                                </div>

                                <div class="mt-4 flex rounded-md shadow-sm">
                                    <span
                                        class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Website:</span>
                                    <input type="text" name="website" id="publisher" autocomplete="off"
                                        class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="https://example.com" value="{{ $publisher->website }}">
                                </div>

                                <div>
                                    <div class="mt-2">
                                        <textarea id="description" name="description" rows="6"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Açıklama">{{ $publisher->description }}</textarea>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-base font-medium text-gray-800">Yayınevi Fotoğrafı</label>
                                    <div
                                        class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                        <div class="space-y-1 text-center">

                                            <div class="flex text-sm text-gray-600">

                                                <label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <div class="photo-preview text-center">
                                                        @if ($publisher->publisher_photo)
                                                            <img class="h-24 w-24 mx-auto"
                                                                src="{{ asset('/') . $publisher->publisher_photo }}"
                                                                alt="">
                                                        @else
                                                            <svg class="mx-auto h-24 w-24 text-gray-400"
                                                                stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                                aria-hidden="true">
                                                                <path
                                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <p class="text-xs text-gray-500 mt-2 mb-1" id="photo-name">2MB'ye
                                                        kadar
                                                        PNG, JPG </p>
                                                    @if ($publisher->publisher_photo)
                                                        <p class="text-sm text-gray-800" id="photo-name">Güncellemek
                                                            için tıklayın </p>
                                                    @endif
                                                    <input id="file-upload" name="publisher_photo" type="file"
                                                        class="sr-only">
                                                </label>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-center sm:px-6">
                                <button id="save-btn" type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Değişiklikleri
                                    Kaydet</button>
                            </div>
                        </div>
                    </form>
                    <div class="remove-publisher bg-gray-50 px-4 py-3 text-right sm:px-6 my-3 text-center">
                        <form id="remove-form" action="{{ route('publishers.destroy', $publisher->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="remove-btn" type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm btn-hover hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Yayınevini
                                Kaldır</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            /* Remove Alert Attr */
            alertTitle = "Dikkat"
            alertMessage = "\'{{ $publisher->publisher_name }}\' adlı yayınevi kaldırılılacak. Bu işlem geri alınamaz!"

            /* Doubleclick Prevent */
            const submitButton = document.querySelector("#save-btn"),
                form = document.querySelector("#edit-form");
                console.log(submitButton);
        </script>

        <script src="{{ asset('/') }}assets/js/admin/admin.js"></script>
    </x-slot>

</x-app-layout>
