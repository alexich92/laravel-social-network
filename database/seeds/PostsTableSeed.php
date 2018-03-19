<?php

use Illuminate\Database\Seeder;

class PostsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title1 = "You can'\t see me";
        $title2 = 'Did I leave the stove on?';
        $title3 = 'Fluffy doggo';
        $title4 = "Yo'\re not you when you are hungry";
        $title5 = 'It will flowwwww';
        $title6 = "I will fight for those who cannot fight for themselves";


        $p1 = [

            'user_id' =>1,
            'title' =>$title1,
            'slug' =>str_slug($title1),
            'image' =>'cat.jpg',
            'points'=>51
        ];

        $p2 = [

            'user_id' =>1,
            'title' =>$title2,
            'slug' =>str_slug($title2),
            'image' =>'deadpool.png',
            'points'=>101
        ];

        $p3 = [

            'user_id' =>1,
            'title' =>$title3,
            'slug' =>str_slug($title3),
            'image' =>'doggo.jpg',
            'points'=>37
        ];


        $p4 = [

            'user_id' =>2,
            'title' =>$title4,
            'slug' =>str_slug($title4),
            'image' =>'ham.jpg',
            'points'=>23
        ];


        $p5 = [

            'user_id' =>2,
            'title' =>$title5,
            'slug' =>str_slug($title5),
            'image' =>'it.jpg',
            'points'=>107
        ];

        $p6 = [

            'user_id' =>2,
            'title' =>$title6,
            'slug' =>str_slug($title6),
            'image' =>'wonder.jpg',
            'points'=>53
        ];


        $post1 =  \App\Post::create($p1);
        $post1->sections()->attach([3,4,2]);
        \App\Like::create([
            'post_id'=>1,
            'user_id'=>1,
            'username'=>$post1->user->username,
            'like' =>1
        ]);

        $post2 =  \App\Post::create($p2);
        $post2->sections()->attach([3,5,1]);
        \App\Like::create([
            'post_id'=>2,
            'user_id'=>1,
            'username'=>$post2->user->username,
            'like' =>1
        ]);

        $post3 = \App\Post::create($p3);
        $post3->sections()->attach([3,4]);
        \App\Like::create([
            'post_id'=>3,
            'user_id'=>1,
            'username'=>$post3->user->username,
            'like' =>1
        ]);

        $post4 = \App\Post::create($p4);
        $post4->sections()->attach([3,7]);
        \App\Like::create([
            'post_id'=>4,
            'user_id'=>2,
            'username'=>$post4->user->username,
            'like' =>1
        ]);

        $post5 = \App\Post::create($p5);
        $post5->sections()->attach([3,6,1]);
        \App\Like::create([
            'post_id'=>5,
            'user_id'=>2,
            'username'=>$post5->user->username,
            'like' =>1
        ]);

        $post6 = \App\Post::create($p6);
        $post6->sections()->attach([3,5,2]);
        \App\Like::create([
            'post_id'=>6,
            'user_id'=>2,
            'username'=>$post6->user->username,
            'like' =>1
        ]);




        }
}
