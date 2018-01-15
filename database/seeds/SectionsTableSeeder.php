<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name1 = 'Trending';
        $name2 = 'Hot';
        $name3 = 'Fresh';
        $name4 = 'Animals';
        $name5 = 'Marvel & DC';
        $name6 = 'Horror';
        $name7 = 'Food';
        $name8 = 'Music';

        $s1 = [
            'name' =>$name1,
            'slug' =>str_slug($name1),
            'image'=>'trending.png',
            'description'=>'Up up up'
        ];
        $s2 = [
            'name' =>$name2,
            'slug' =>str_slug($name2),
            'image'=>'hot.png',
            'description'=>'Hot baby hot'
        ];
        $s3 = [
            'name' =>$name3,
            'slug' =>str_slug($name3),
            'image'=>'fresh.jpg',
            'description'=>'What do we have here! hihi'
        ];
        $s4 = [
            'name' =>$name4,
            'slug' =>str_slug($name4),
            'image'=>'cat.jpg',
            'description'=>'It\'s so fluffy I\'m gonna die!'
        ];
        $s5 = [
            'name' =>$name5,
            'slug' =>str_slug($name5),
            'image'=>'marvel_and_dc.jpg',
            'description'=>'Home of web comics'
        ];
        $s6 = [
            'name' =>$name6,
            'slug' =>str_slug($name6),
            'image'=>'horror.png',
            'description'=>'Fear to the limit of fun'
        ];
        $s7 = [
            'name' =>$name7,
            'slug' =>str_slug($name7),
            'image'=>'food.png',
            'description'=>'Crazy foodies'
        ];
        $s8 = [
            'name' =>$name8,
            'slug' =>str_slug($name8),
            'image'=>'music.png',
            'description'=>'Drop the beat now'
        ];




        \App\Section::create($s1);
        \App\Section::create($s2);
        \App\Section::create($s3);
        \App\Section::create($s4);
        \App\Section::create($s5);
        \App\Section::create($s6);
        \App\Section::create($s7);
        \App\Section::create($s8);
    }
}
