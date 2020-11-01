<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    static $books = [
        [
            'name' => 'Network Effect',
            'author' => 'Martha Wells',
            'status' => 'Available',
            'user_borrow' => null,
            'publication_date' => '2020-05-05',
            'category_id' => 1,
        ],

        [
            'name' => 'Lord of the Flies',
            'author' => 'William Golding',
            'status' => 'Not Avaiable',
            'user_borrow' => null,
            'publication_date' => '1954-09-17',
            'category_id' => 1,
        ],

        [
            'name' => 'The Orphan of Cemetery Hill',
            'author' => 'Hester Fox',
            'status' => 'Available',
            'user_borrow' => null,
            'publication_date' => '2020-09-15',
            'category_id' => 6,
        ],

        [
            'name' => 'The Adventures of Sherlock Holmes',
            'author' => 'Arthur Conan Doyle',
            'status' => 'Borrowed',
            'user_borrow' => 'Jaime Sánchez',
            'publication_date' => '1892-10-14',
            'category_id' => 2,
        ],

        [
            'name' => 'Smash It!',
            'author' => 'Francina Simone',
            'status' => 'Available',
            'user_borrow' => null,
            'publication_date' => '2020-09-22',
            'category_id' => 8,
        ],

        [
            'name' => 'Skyhunter',
            'author' => 'Marie Lu',
            'status' => 'Borrowed',
            'user_borrow' => 'Joaquín Ruiz',
            'publication_date' => '2020-09-29',
            'category_id' => 9,
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$books as $book) {
            Book::create([
                'name' => $book['name'],
                'author' => $book['author'],
                'status' => $book['status'],
                'user_borrow' => $book['user_borrow'],
                'publication_date' => $book['publication_date'],
                'category_id' => $book['category_id']
            ]);
        }
    }
}
