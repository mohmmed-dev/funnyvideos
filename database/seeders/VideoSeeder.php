<?php

namespace Database\Seeders;

use App\Jobs\ConvertVideoForStreaming;
use App\Models\Hashtag;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first = Video::create([
            'user_id' => fake()->numberBetween(1,20),
            'title' => 'funny video 1',
            'slug' => fake()->lexify('?????_????_???_??'),
            'desc' => 'funny video 1',
            'video_path' => 'first.mp4',
            'image_path' =>  'default1.png',
            'title' => '240',
        ]);
        ConvertVideoForStreaming::dispatch('first.mp4','public',$first);
        $first->view()->create(
            ['user_id' => $first->user_id]
        );
        $second = Video::create([
            'user_id' => fake()->numberBetween(1,20),
            'title' => 'funny video 1',
            'slug' => fake()->lexify('?????_????_???_??'),
            'desc' => 'funny video 1',
            'video_path' => 'second.mp4',
            'image_path' =>  'default1.png',
            'title' => '240',
        ]);
        ConvertVideoForStreaming::dispatch('second.mp4','public',$second);
        $second->view()->create(
            ['user_id' => $second->user_id]
        );
        $third = Video::create([
            'user_id' => fake()->numberBetween(1,20),
            'title' => 'funny video 1',
            'slug' => fake()->lexify('?????_????_???_??'),
            'desc' => 'funny video 1',
            'video_path' => 'third.mp4',
            'image_path' =>  'j',
            'title' => '240',
        ]);
        ConvertVideoForStreaming::dispatch('third.mp4','public',$third);
        $third->view()->create(
            ['user_id' => $third->user_id]
        );
        $fourth = Video::create([
            'user_id' => fake()->numberBetween(1,20),
            'title' => 'funny video 1',
            'slug' => fake()->lexify('?????_????_???_??'),
            'desc' => 'funny video 1',
            'video_path' => 'fourth.mp4',
            'image_path' =>  'default1.png',
            'title' => '240',
        ]);
        ConvertVideoForStreaming::dispatch('fourth.mp4','public',$fourth);
        $fourth->view()->create(
            ['user_id' => $fourth->user_id]
        );
        $fifth = Video::create([
            'user_id' => fake()->numberBetween(1,20),
            'title' => 'funny video 1',
            'slug' => fake()->lexify('?????_????_???_??'),
            'desc' => 'funny video 1',
            'video_path' => 'fifth.mp4',
            'image_path' =>  'default1.png',
            'title' => '240',
        ]);
        ConvertVideoForStreaming::dispatch('fifth.mp4','public',$fifth);
        $fifth->view()->create(
            ['user_id' => $fifth->user_id]
        );
        $sixth = Video::create([
            'user_id' => fake()->numberBetween(1,20),
            'title' => 'funny video 1',
            'slug' => fake()->lexify('?????_????_???_??'),
            'desc' => 'funny video 1',
            'video_path' => 'sixth.mp4',
            'image_path' =>  'default1.png',
            'title' => '240',
        ]);
        ConvertVideoForStreaming::dispatch('sixth.mp4','public',$sixth);
        $sixth->view()->create(
            ['user_id' => $sixth->user_id]
        );
    }
}
