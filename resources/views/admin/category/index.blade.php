<x-app-layout>
    <x-slot name="title">
        Kategoriler | Yönetim Paneli
    </x-slot>
    <x-slot name="header">
        Kategoriler
    </x-slot>
    <x-slot name="breadcrumb">
        <!-- For current page -->
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">

            {{-- Serach&Filter Area --}}
            <div class="col-12 mt-2 text-right">
                <a href="{{ route('categories.create') }}" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fa-solid fa-plus pl-0 mr-2"></i>Kategori
                    Ekle</a>
            </div>
        </div>


        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Kategori
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Açılama
                        </th>
                        <th scope="col" class="py-3 px-6">
                            İşlem
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-900">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>

                            <td class="py-4 px-6">
                                {{ $category->category_name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $category->description }}
                            </td>
                            <td class="flex items-center py-4 px-6 space-x-3">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-700 hover:underline mr-2">Düzenle</a>
                            </td>
                        </tr>

                        @if ($category->childrenAll)
                            @include('admin/category/components/category-row', [
                                'categories' => $category->childrenAll,
                            ])
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="p-3">
                {{ $categories->links() }}
            </div>
        </div>


    </div>
</x-app-layout>
