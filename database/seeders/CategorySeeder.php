<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    static $categories = [
        [
            'name' => 'Action and Adventure',
            'description' => 'The stories under this genre usually show an event or a series of events that happen outside the course of the protagonist’s ordinary life. '
        ],

        [
            'name' => 'Crime and Detective',
            'description' => 'This book genre deals with crime, criminal motives and the investigation and detection of the crime and criminals.'
        ],

        [
            'name' => 'Drama',
            'description' => 'Dramas are stories composed in verse or prose, usually for theatrical performance, where conflicts and emotions are expressed through dialogue and actions.'
        ],

        [
            'name' => 'Fantasy',
            'description' => 'A Book under this genre contains a story set in a fantasy world – a world that is not real and often includes magic, magical creatures, and supernatural events.'
        ],

        [
            'name' => 'Historical Fiction',
            'description' => 'Historical fiction is a genre of book that includes writings that reconstruct the past. The story is set in the past keeping the manners, social conditions and other details of that period unchanged. The writers incorporate the past events or people in their fictitious stories.'
        ],

        [
            'name' => 'Horror',
            'description' => 'Horror is a genre that is intended to or has the ability to create the feeling of fear, repulsion, fright or terror in the readers. In other words, it creates a frightening and horror atmosphere.'
        ],

        [
            'name' => 'Mystery',
            'description' => 'Horror is a genre that is intended to or has the ability to create the feeling of fear, repulsion, fright or terror in the readers. In other words, it creates a frightening and horror atmosphere.'
        ],

        [
            'name' => 'Romance',
            'description' => 'The primary focus of romance fiction is on the relationship and romantic love between two people. These books have an emotionally satisfying and optimistic ending.'
        ],

        [
            'name' => 'Science Fiction',
            'description' => 'Science Fiction typically deals with imaginative and futuristic concepts such as advanced science and technology, time travel, extraterrestrial life, etc. The stories are often set in the future or on other planets.'
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description']
            ]);
        }
    }
}
