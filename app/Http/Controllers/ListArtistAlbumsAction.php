<?php

namespace App\Http\Controllers;
use App\Http\Resources\Artist as ArtistResource;
use App\Artist;
use Illuminate\Http\Request;

class ListArtistAlbumsAction extends Controller
{
    public function __invoke(Request $request, $artistId)
    {
        $artist = Artist::findOrFail($artistId);
        $art=$artist->albums()->orderBy('release_date', 'desc')->get();
        return new ArtistResource($art);
        
    }
}
