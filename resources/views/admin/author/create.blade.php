<x-app-layout>
    <x-slot name="title">
        Yazar Ekle | Yönetim Paneli
    </x-slot>

    <x-slot name="header">
        Yazar Ekle
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
                    <a href="{{ route('authors.index') }}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Yazarlar</a>
                </div>
            </li>


        </x-slot>
    </x-slot>

</x-app-layout>
