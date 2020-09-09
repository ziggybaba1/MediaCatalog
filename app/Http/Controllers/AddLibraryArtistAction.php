<?php

namespace App\Http\Controllers;
use App\Http\Resources\Artist as ArtistResource;
use App\Artist;
use Illuminate\Http\Request;

class AddLibraryArtistAction extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'artist_id' => 'required|numeric|exists:artists,id'
        ]);

        $artist = Artist::find($request->artist_id);
        
        foreach($artist->albums as $album) {
            $request->user()
                ->songs()
                ->syncWithoutDetaching($album->songs);
        }
        
        return new ArtistResource($artist);
    }
}
