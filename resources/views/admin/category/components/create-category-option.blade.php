@foreach ($categories as $category)
    <option value="{{ $category->id }}" class="category-opt">
        {{ $category->category_name }}</option>

    @if ($category->childrenAll)
        @include('admin/category/components/create-category-option', [
            'categories' => $category->childrenAll,
        ])
    @endif
@endforeach
