<?php

use App\artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        artist::truncate();

        $artist1 = artist::create([
            'name' => 'Bensound',
            
        ]);
        $artist1 = artist::create([
            'name' => 'Queen',
            
        ]);
        $artist1 = artist::create([
            'name' => 'Guus Meeuwis',
            
        ]);
        $artist1 = artist::create([
            'name' => 'Michael Jackson',
            
        ]);
        $artist1 = artist::create([
            'name' => 'Elvis',
            
        ]);
    }
}
