<?php

namespace App\Http\Controllers;
use App\Http\Resources\Song as SongResource;
use App\Song;
use Illuminate\Http\Request;

class AddLovedSongsAction extends Controller
{
    public function update(Request $request, Song $songId)
    {
        $request->user()
            ->songs()
            ->updateExistingPivot($songId, ['loved' => ! $songId->users->first()->library->loved]);
        
            return new SongResource($songId);
    }
}
