<?php

namespace Database\Factories;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     protected $model = Book::class;

    public function definition()
    {
        return [
            'isbn' => rand(10000,99999)."".rand(10000,99999)."".rand(100,999),
            'title' => $this->faker->sentence(rand(1,3)),
            
        ];
    }
}
