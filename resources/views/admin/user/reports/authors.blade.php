<x-app-layout>
    <x-slot name="title">
        Yazarlar İçin Oluşturulan Hata Raporları | Yönetim Paneli
    </x-slot>
    <x-slot name="header">
        Yazarlar İçin Oluşturulan Hata Raporları
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
                    <a href="{{ route('user.reports.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Kullanıcı Hata Raporları</a>
                </div>
            </li>
        </x-slot>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center pt-4 pb-3 bg-white dark:bg-gray-900">
            <!-- Serach&Filter Area -->
            {{-- <div class="col-8">
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Ara</label>
                    <div class="">
                        <div class="absolute inset-y-0 left-2 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-100 px-5 py-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Kitap, ISBN, yazar, yayınevi..." value="{{ request()->get('search') }}"
                            minlength="3" autocomplete="off" required name="search">
                        <button type="submit"
                            class=" hidden text-white absolute right-6 bottom-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ara</button>
                    </div>
                </form>
            </div> 
            <div class="col-2 text-center">
                @if (request()->has('search'))
                    <a href="{{ route('books.index') }}"
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-blue-800">Aramayı
                        Temizle</a>
                @endif
            </div>
            --}}
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Rapor Eden Kullanıcı
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Rapor Edilen Yazar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Rapor Edilen Veriler
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span title="Güncelleme Tarihi">Tarih</span>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        İşlem
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $report)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <!-- User -->
                        <td>
                            <div class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="{{ $report->user->profile_photo_url }}"
                                    alt="Jese image">
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ $report->user->name }}</div>
                                    {{-- <div class="font-normal text-gray-500">Subinfo</div> --}}
                                </div>
                            </div>
                        </td>
                        <!-- Book -->
                        <td>
                            <div class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10"
                                    @if ($report->author->author_photo) src="{{ asset($report->author->author_photo) }}" 
                            @else src="{{ asset('/') . 'storage/authors/default.png' }}" @endif
                                    alt="{{ $report->author->author_name }}-img">
                                <div class="pl-3">
                                    <div class="text-base font-semibold" title="{{ $report->author->author_name }}">
                                        {{ Str::limit($report->author->author_name, 25, '...') }}</div>
                                </div>
                            </div>
                        </td>
                        <!-- Reports -->
                        <td class="py-4 px-6" width="340px" title="Rapor Edilen Veriler">
                            <div class="row font-bold">
                                @php
                                    $collection = collect($report);
                                    $collection->each(function ($item, $key) {
                                        if ($item == 'reported') {
                                            print "<span class='col-5 capitalize mb-2'><span class='text-danger'>" . __($key) . '</span></span>';
                                        }
                                    });
                                @endphp

                            </div>
                        </td>
                        <!-- Date -->
                        <td class="py-4 px-6" title="{{ $report->created_at->format('d.m.Y (H:i)') }}">
                            {{ $report->created_at->diffForHumans() }}
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{ route('authors.edit', $report->author->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500">Yazarı Düzenle<i
                                    class="fa fa-pen ml-2"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Search Info --}}
        @if ($reports->total() == 0)
            <div class="flex m-4 p-4 text-base text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    Rapor bulunamadı.
                </div>
            </div>
        @endif

        {{-- Pagination --}}
        <div class="p-3">
            {{ $reports->links() }}
        </div>
    </div>
</x-app-layout>
