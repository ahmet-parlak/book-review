@foreach ($categories as $category)
    @if ($category->id != $currentCategory)
        <option class="category-opt" value="{{ $category->id }}" @if ($parentCategory == $category->id) selected @endif>
            {{ $category->category_name }}</option>
    @endif

    @if ($category->childrenAll)
        @include('admin/category/components/edit-category-option', [
            'categories' => $category->childrenAll,
            'currentCategory' => $currentCategory,
            'parentCategory' => $parentCategory,
        ])
    @endif
@endforeach
