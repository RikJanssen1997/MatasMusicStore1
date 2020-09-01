<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index(){
        $albums = Album::with('artist')->get();
        return view('albums')->with([
            'albums' => $albums
        ]

        );
    }
    public function create(){
        $artists = Artist::all();

        return view('createAlbum')->with([
            'artists' => $artists
        ]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'artist' => 'required|numeric',
            'genre' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $image = $request->file('image');
        $album = new Album;
        $album->title = $request->title;
        $album->artist_id = $request->artist;
        $album->genre = $request->genre;
        $album->save();
        if(isset($image)){
            $input['imagename'] = $image->getClientOriginalName();
            $destinationPath = '/images/albumcovers/' . $album->id;
            $location = $destinationPath . "/". $input['imagename'];
            $image->move(public_path() . $destinationPath, $input['imagename']);
            $album->artwork = $location;
            $album->save();
        }
        return redirect()->route('showAlbum', ['id' => $album->id]);
    }

    public function show($id){
        $album = Album::find($id);
        return view('albumOverview')->with([
            'album' => $album
        ]);
    }

    public function shop(){
        $albums = Album::with('artist')->get();
        return view('shopOverview')->with([
            'albums' => $albums
        ]

        );
    }
    public function showShopAlbum($id){
        $album = Album::find($id);
        return view('showShopAlbum')->with([
            'album' => $album
        ]);
    }
    public function buy($id){
        $user = Auth::user();
        if(!$user->albums->contains($id)){
            $user->albums()->syncWithoutDetaching($id);
        }
        return redirect()->route('albumShop');
    }
}
