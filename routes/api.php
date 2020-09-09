 <?php

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
Route::post('/logout', 'AuthController@logout');

Route::group(['prefix' => 'topics'], function () {
	Route::post('/', 'TopicController@store')->middleware('auth:api');
	Route::get('/', 'TopicController@index');
	Route::get('/{topic}', 'TopicController@show');
	Route::patch('/{topic}', 'TopicController@update')->middleware('auth:api');
	Route::delete('/{topic}', 'TopicController@destroy')->middleware('auth:api');
	// post route groups
	Route::group(['prefix' => '/{topic}/posts'], function () {
		Route::get('/{post}', 'PostController@show');
		Route::post('/', 'PostController@store')->middleware('auth:api');
		Route::patch('/{post}', 'PostController@update')->middleware('auth:api');
		Route::delete('/{post}', 'PostController@destroy')->middleware('auth:api');
		// likes
		Route::group(['prefix' => '/{post}/likes'], function () {
			Route::post('/', 'PostLikeController@store')->middleware('auth:api');
		});
	});
});

Route::group(['prefix' => 'artist'], function () {
	Route::get('/artists', 'ListArtistsAction')->name('artists');
    Route::get('/artists/{artistId}/albums', 'ListArtistAlbumsAction')->name('artist.albums');
});
Route::group(['prefix' => 'albums'], function () {
	Route::get('/', 'ListAlbumsAction')->name('albums');
    Route::get('/{albumId}/songs', 'ViewAlbumSongsAction')->name('album.songs');
});
Route::group(['prefix' => 'library'], function () {
	Route::post('/song', 'AddLibrarySongAction')->name('library.song.store');
    Route::post('/album', 'AddLibraryAlbumAction')->name('library.album.store')->middleware('auth:api');
    Route::post('/artist', 'AddLibraryArtistAction')->name('library.artist.store')->middleware('auth:api');
    Route::get('/artists', 'ViewLibraryArtistsAction')->name('library.artists');
    Route::get('/artists/{artistId}/albums', 'ViewLibraryArtistAlbumsAction')->name('library.artist.albums');
    Route::get('/albums', 'ViewLibraryAlbumsAction')->name('library.albums');
    Route::get('/albums/{albumId}/songs', 'ViewLibraryAlbumSongsAction')->name('library.album.songs');
    Route::patch('/loved/{songId}', 'AddLovedSongsAction@update')->name('library.song.loved')->middleware('auth:api');
    Route::get('/loved', 'ViewLovedSongsAction')->name('library.loved');
});