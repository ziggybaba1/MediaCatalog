<?php

namespace App\Http\Controllers;
use App\Http\Resources\Song as SongResource;
use App\Song;
use Illuminate\Http\Request;

class AddLibrarySongAction extends Controller
{
    public function __invoke(Request $request, Song $song)
    {
        $this->validate($request, [
            'song_id' => 'required|numeric|exists:songs,id'
        ]);

        $request->user()
            ->songs()
            ->syncWithoutDetaching($request->song_id);
        
            return new SongResource($song);
    }
}
