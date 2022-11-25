<x-app-layout>
    <x-slot name="title">
        Kitaplar | Yönetim Paneli
    </x-slot>
    <x-slot name="header">
        Kitaplar
    </x-slot>
    <x-slot name="breadcrumb">
        <!-- For current page -->
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">

            {{-- Serach&Filter Area --}}
            <div class="col-12 mt-2 text-right">
                <a href="{{ route('books.create') }}" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-plus pl-0 mr-2"></i>Kitap
                    Ekle</a>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Başlık
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ISBN
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Yayınevi
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Y. Yılı
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Kategori
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Açıklama
                    </th>
                    <th scope="col" class="py-3 px-6">
                        İşlem
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10"
                                @if ($book->book_photo) src="{{ asset('/') . $book->book_photo }}"
                                @else
                                src="{{ asset('/') . 'storage/books/default.png' }}" @endif
                                alt="Jese image">
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $book->title }}</div>
                                <div class="font-normal text-gray-500">{{ $book->bookAuthor->author->author_name }}
                                </div>
                            </div>
                        </th>
                        <td class="py-4 px-6">
                            {{ $book->isbn }}
                        </td>
                        <td class="py-4 px-6" title="{{$book->publisher->publisher_name}}">
                            {{ Str::limit($book->publisher->publisher_name, 20, '...') }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                {{-- <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> --}} {{ $book->publication_year }}
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            {{ $book->bookCategory->category->category_name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ Str::limit($book->description, 30, '...') }}
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{route('books.edit',$book->id)}}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Düzenle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">
            {{ $books->links() }}
        </div>
    </div>

</x-app-layout>
