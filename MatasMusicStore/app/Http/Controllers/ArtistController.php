<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artist::all();
        return view('artists')->with([
            'artists' => $artists
        ]

        );
    }
    public function show($id){
        $artist = Artist::find($id);
        return view('editArtist')->with([
            'artist' => $artist
        ]);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request,Artist $artist){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $artist->name = $request->name;
        $artist->save();
        return redirect()->route('artists');
    }
    public function store( Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $artist = new Artist();
        $artist->name = $request->name;
        $artist->save();
        return redirect()->route('artists');
    }
    public function create(){
        return view('createArtist');
    }
}
