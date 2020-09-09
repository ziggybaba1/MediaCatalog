<?php

namespace App\Http\Controllers;
use App\Http\Resources\Album as AlbumResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLibraryAlbumsAction extends Controller
{
    public function __invoke(Request $request)
    {
        $albums = $request->user()
            ->songs()
            ->with('album.artist')
            ->get()
            ->unique('album')
            ->pluck('album');
            return new AlbumResource($albums);
    }
}
