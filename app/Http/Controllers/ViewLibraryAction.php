<?php

namespace App\Http\Controllers;
use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLibraryAction extends Controller
{
    public function __invoke(Request $request)
    {
        return new UserResource($request->user()->songs->load('album.artist'));
    }
}
