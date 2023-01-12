<div class="nav-item dropdown dropright">
    <a href="{{ route('search') }}?search={{ $category->category_name }}" class="nav-link "
        data-toggle="dropdown">{{ $category->category_name }}
        <i class="fa fa-angle-right float-right mt-1"></i></a>
    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
        @foreach ($category->childrenAll as $subcategory)
            @if (count($subcategory->childrenAll))
                <ul>@include('template.subcategory', ['category' => $subcategory])</ul>
            @else
                <a href="{{ route('search') }}?search={{ $subcategory->category_name }}"
                    class="dropdown-item">{{ $subcategory->category_name }}</a>
            @endif
        @endforeach
    </div>
</div>
