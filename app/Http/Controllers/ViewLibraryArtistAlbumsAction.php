<?php

namespace App\Http\Controllers;
use App\Http\Resources\Album as AlbumResource;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLibraryArtistAlbumsAction extends Controller
{
    public function __invoke(Request $request, Artist $artistId)
    {
        $usersSongs = $request->user()->songs->pluck('id');
        
        $albums = $artistId->load(['albums' => function ($query) use ($usersSongs) {
                $query->whereHas('songs', function ($query) use ($usersSongs) {
                    $query->whereIn('id', $usersSongs);
                });
            }])
            ->albums;
            return new AlbumResource($albums);
        
    }
}
