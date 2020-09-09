<?php

namespace App\Http\Controllers;
use App\Http\Resources\Song as SongResource;
use App\Album;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLibraryAlbumSongsAction extends Controller
{
    public function __invoke(Request $request, Album $albumId)
    {
        $usersSongs = $request->user()->songs->pluck('id');
        
        $songs = $albumId->load(['songs' => function ($query) use ($usersSongs) {
               $query->whereIn('id', $usersSongs);
            }])
            ->songs;
        return new SongResource($songs);
    
    }
}
