<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBooks>
 */
class UserBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $user = \App\Models\User::with('books')->has('books', '<', 10)->get()->random();
        $books_id = $user->books->pluck('id');
        $book = \App\Models\Book::whereNotIn('id',$books_id)->get()->random()->id;
        return [
            'user_id' => $user->id,
            'book_id' => $book
        ];
    }
}
