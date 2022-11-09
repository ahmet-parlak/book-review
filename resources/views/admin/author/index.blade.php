<x-app-layout>
    <x-slot name="header">
        Yazarlar | Yönetim Paneli
    </x-slot>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">

            {{-- Serach&Filter Area --}}
            <div class="col-12 mt-2 text-right">
                <a href="{{route('authors.create')}}" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-plus pl-0 mr-2"></i>Yazar
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
                        Açıklama
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Durum
                    </th>
                    <th scope="col" class="py-3 px-6">
                        İşlem
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name=B&color=7F9CF5&background=EBF4FF"
                                alt="Jese image">
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{$author->author_name}}</div>
                                <div class="font-normal text-gray-500">Yazar</div>
                            </div>
                        </th>
                        <td class="py-4 px-6">
                            Lorem ipsum dolor sit.
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> durum
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Düzenle</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">
            {{$authors->links()}}
        </div>
    </div>

</x-app-layout>
