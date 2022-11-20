@foreach ($categories as $category)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
