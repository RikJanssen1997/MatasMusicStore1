<?php

namespace App\Http\Controllers;

use App\Album;
use App\Rules\PositionOverlap;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function store(Request $request, Album $album)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'position' => ['required', 'integer', 'min:1', new PositionOverlap($album->id)],
            'song' => 'required|mimes:mpga',
        ]);
        $songfile = $request->file('song');
        $song = new Song;
        $audio = new \wapmorgan\Mp3Info\Mp3Info($request->song, true);
        $song->duration = gmdate("H:i:s", $audio->duration);

        $song->track_number = $request->position;
        $song->title = $request->title;

        //storing file
        $input['songName'] = $songfile->getClientOriginalName();
        $destinationPath = '\\songs\\' . $album->id . '\\' . $song->track_number;
        $location = $destinationPath . '\\' . $input['songName'];
        $songfile->move(public_path() . $destinationPath, $input['songName']);
        $song->file = $location;
        $song->album_id = $album->id;
        $song->originalFile = $location;

        $song->save();
        return redirect()->route('showAlbum', ['id' => $album->id]);
    }

    public function download($id)
    {
        $user = Auth::user();
        $albums = $user->albums;
        $possesion = false;
        $song = Song::find($id);
        //check if song exists and is in possesion of the user
        if (isset($song)) {
            foreach ($albums as $album) {
                if ($song->album_id == $album->id) {
                    $possesion = true;
                    break;
                }
            }
        }

        if ($possesion) {
            return response()->download(public_path($song->file));
        }
        return redirect()->route('collection');
    }
    public function showCollection()
    {
        $user = Auth::user();
        $albums = $user->albums;
        $songs = collect(new Song);
        foreach ($albums as $album) {
            $albumSongs = $album->songs;
            foreach ($albumSongs as $song) {
                $song->album->artist->name;
                $songs->push($song);
            }
        }

        return view('songCollection')->with([
            'songs' => $songs,
        ]);
    }
}
