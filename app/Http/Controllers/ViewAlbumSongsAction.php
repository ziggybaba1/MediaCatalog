<?php

namespace App\Http\Controllers;
use App\Http\Resources\Album as AlbumResource;
use App\Album;
use Illuminate\Http\Request;

class ViewAlbumSongsAction extends Controller
{
    public function __invoke(Request $request, $albumId)
    {
        $album = Album::findOrFail($albumId);
        $alb=$album->songs()->orderBy('track_number', 'asc')->get();
        return new AlbumResource($alb);
       
    }
}
