<x-app-layout>

    <x-slot name="title">
        Yayınevleri | Yönetim Paneli
    </x-slot>

    <x-slot name="header">
        Yayınevleri
    </x-slot>

    <x-slot name="breadcrumb">
        <!-- For current page -->
    </x-slot>



    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center pb-3 bg-white dark:bg-gray-900">

            {{-- Serach&Filter Area --}}
            <div class="col-12 mt-2 text-right">
                <a href="{{ route('publishers.create') }}" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-plus pl-0 mr-2"></i>Yayınevi
                    Ekle</a>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Yayınevi
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Website
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Açıklama
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Kitap Sayısı
                    </th>
                    <th scope="col" class="py-3 px-6">
                        İşlem
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full border"
                                @if ($publisher->publisher_photo) src="{{ asset('/') . $publisher->publisher_photo }}"
                                @else
                                src="{{ asset('/') . 'storage/publishers/default.jpg' }}" @endif
                                alt="Jese image">
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $publisher->publisher_name }}</div>
                            </div>
                        </th>
                        <td class="py-4 px-6">
                            <a href="{{ $publisher->website }}" target="_blank"
                                rel="noopener noreferrer">{{ $publisher->website }}</a>
                        </td>
                        <td class="py-4 px-6">
                            <p class="m-0">{{ Str::limit($publisher->description, 40, '...') }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <p class="m-0">{{ $publisher->bookCount() }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{ route('publishers.edit', $publisher->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Düzenle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">
            {{ $publishers->links() }}
        </div>
    </div>

</x-app-layout>
