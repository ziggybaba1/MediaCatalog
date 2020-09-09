<?php

namespace App\Http\Controllers;
use App\Http\Resources\Artist as ArtistResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLibraryArtistsAction extends Controller
{
    public function __invoke(Request $request)
    {
        $artists = $request->user()
            ->songs()
            ->with('album.artist')
            ->get()
            ->unique('album.artist')
            ->pluck('album.artist');
            return new ArtistResource($artist);
        
    }
}
