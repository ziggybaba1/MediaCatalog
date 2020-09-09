<?php

namespace App\Http\Controllers;
use App\Http\Resources\Artist as ArtistResource;
use App\Artist;
use Illuminate\Http\Request;

class ListArtistsAction extends Controller
{
    public function __invoke(Request $request,Artist $artist)
    {
        return new ArtistResource($artist);
    }
}
