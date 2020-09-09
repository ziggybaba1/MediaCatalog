<?php

namespace App\Http\Controllers;
use App\Http\Resources\Album as AlbumResource;
use App\Album;
use Illuminate\Http\Request;

class AddLibraryAlbumAction extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'album_id' => 'required|numeric|exists:albums,id'
        ]);
        
        $album = Album::find($request->album_id);

        $request->user()
            ->songs()
            ->syncWithoutDetaching($album->songs);

        return new AlbumResource($album);
    }
}
