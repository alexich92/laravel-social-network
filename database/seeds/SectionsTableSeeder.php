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
        $name4 = 'Funny';
        $name5 = 'Marvel & DC';

        $s1 = [
            'name' =>$name1,
            'slug' =>str_slug($name1)
        ];
        $s2 = [
            'name' =>$name2,
            'slug' =>str_slug($name2)
        ];
        $s3 = [
            'name' =>$name3,
            'slug' =>str_slug($name3)
        ];
        $s4 = [
            'name' =>$name4,
            'slug' =>str_slug($name4)
        ];
        $s5 = [
            'name' =>$name5,
            'slug' =>str_slug($name5)
        ];
        \App\Section::create($s1);
        \App\Section::create($s2);
        \App\Section::create($s3);
        \App\Section::create($s4);
        \App\Section::create($s5);
    }
}
