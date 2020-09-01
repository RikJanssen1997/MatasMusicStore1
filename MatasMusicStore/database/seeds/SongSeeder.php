<?php

use App\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Song::truncate();

        Song::create([
            'title' => 'Once Again',
            'album_id' => '1',
            'track_number' => '1',
            'duration' =>  gmdate("H:i:s", '231'),
            'file' => '\songs\1\1\bensound-onceagain.mp3',
            'originalFile' => '\songs\1\1\bensound-onceagain.mp3'
        ]);
        Song::create([
            'title' => 'Buddy',
            'album_id' => '1',
            'track_number' => '2',
            'duration' =>  gmdate("H:i:s", '122'),
            'file' => '\songs\1\2\bensound-buddy.mp3',
            'originalFile' => '\songs\1\2\bensound-buddy.mp3'
        ]);
        Song::create([
            'title' => 'Funny Song',
            'album_id' => '1',
            'track_number' => '3',
            'duration' =>  gmdate("H:i:s", '187'),
            'file' => '\songs\1\3\bensound-funnysong.mp3',
            'originalFile' => '\songs\1\3\bensound-funnysong.mp3'
        ]);
        Song::create([
            'title' => 'Bohemian Rapsody',
            'album_id' => '2',
            'track_number' => '1',
            'duration' =>  gmdate("H:i:s", '359'),
            'file' => '\songs\2\1\BohemianRapsody.mp3',
            'originalFile' => '\songs\2\1\BohemianRapsody.mp3'
        ]);
    }
}
