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
        ],

        [
            'name' => 'Death of a Salesman',
            'author' => 'Arthur Miller',
            'status' => 'Borrowed',
            'user_borrow' => 'William Shneider',
            'publication_date' => '1949-09-29',
            'category_id' => 3,
        ],

        [
            'name' => 'Hamlet',
            'author' => 'William Shakespeare',
            'status' => 'Available',
            'user_borrow' => '',
            'publication_date' => '1609-09-29',
            'category_id' => 3,
        ],

        [
            'name' => 'The Thursday Murder Club',
            'author' => 'Richard Osman',
            'status' => 'Available',
            'user_borrow' => '',
            'publication_date' => '2020-09-03',
            'category_id' => 7,
        ],

        [
            'name' => '19th Christmas',
            'author' => 'James Patterson',
            'status' => 'Borrowed',
            'user_borrow' => 'Richard Johnson',
            'publication_date' => '2010-10-07',
            'category_id' => 7,
        ],

        [
            'name' => 'Ready Player Ones',
            'author' => 'Ernest Cline',
            'status' => 'Borrowed',
            'user_borrow' => 'Sofia Rivero',
            'publication_date' => '2011-08-16',
            'category_id' => 1,
        ],

        [
            'name' => 'Skyhunter',
            'author' => 'Marie Lu',
            'status' => 'Borrowed',
            'user_borrow' => 'Joaquín Ruiz',
            'publication_date' => '2020-09-29',
            'category_id' => 5,
        ],

        [
            'name' => 'War Lord',
            'author' => 'Bernard Cornwell',
            'status' => 'Borrowed',
            'user_borrow' => 'Alejandro Rivero',
            'publication_date' => '2020-10-15',
            'category_id' => 1,
        ],

        [
            'name' => 'Moby Dick',
            'author' => 'Herman Melville',
            'status' => 'Borrowed',
            'user_borrow' => 'Gerardo Ruiz',
            'publication_date' => '1851-04-27',
            'category_id' => 1,
        ],

        [
            'name' => 'Outlander',
            'author' => 'Diana Gabaldon',
            'status' => 'Available',
            'user_borrow' => '',
            'publication_date' => '1991-07-01',
            'category_id' => 5,
        ],

        [
            'name' => 'Snow Flower and the Secret Fan',
            'author' => 'Lisa See',
            'status' => 'Not Available',
            'user_borrow' => '',
            'publication_date' => '2005-07-28',
            'category_id' => 5,
        ],

        [
            'name' => 'Me Before You',
            'author' => 'Jojo Moyes',
            'status' => 'Borrowed',
            'user_borrow' => 'Juan Perez',
            'publication_date' => '2012-01-05',
            'category_id' => 8,
        ],

        [
            'name' => 'It Ends With Us',
            'author' => 'Colleen Hoover',
            'status' => 'Available',
            'user_borrow' => '',
            'publication_date' => '2016-08-02',
            'category_id' => 8,
        ],

        [
            'name' => 'The Stand',
            'author' => 'Stephen King',
            'status' => 'Not Available',
            'user_borrow' => '',
            'publication_date' => '1978-10-03',
            'category_id' => 9,
        ],

        [
            'name' => 'Dune',
            'author' => 'Frank Herbert',
            'status' => 'Available',
            'user_borrow' => '',
            'publication_date' => '1965-08-01',
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
