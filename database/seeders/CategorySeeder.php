<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::insert([
            'category_name' => "Edebiyat",
        ]);

        \App\Models\Category::insert([
            'category_name' => "Roman",
            'parent_id' => 1,

        ]);
        \App\Models\Category::insert([
            'category_name' => "Araştırma-Tarih",
        ]);
    }
}
