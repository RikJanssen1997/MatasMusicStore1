<?php

use App\Album;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::truncate();
        DB::table('user_albums')->truncate();
        $album = Album::create([
            'title' => 'Bensound Collection',
            'artist_id' => '1',
            'genre' => 'Geen Copyright',
            'artwork' => '/images/albumcovers/1/bensound.jpg'

        ]);
        $album = Album::create([
            'title' => 'Bohemian Rapsody Single',
            'artist_id' => '2',
            'genre' => 'Rock',
            'artwork' => '/images/albumcovers/2/bohemianRapsody.jpg'
        ]);

        $user = User::find(2);
        $user->albums()->sync(1);
    }
}
