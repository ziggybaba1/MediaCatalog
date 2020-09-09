<?php

namespace App\Http\Controllers;
use App\Http\Resources\Album as AlbumResource;
use App\Album;
use Illuminate\Http\Request;

class ListAlbumsAction extends Controller
{
    public function __invoke(Request $request,Album $album)
    {
        return new AlbumResource($album);
    }
}
