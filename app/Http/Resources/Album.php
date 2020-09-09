<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Album extends JsonResource {
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id' => $this->id,
			'name' => $this->name,
			'created_at' => '', //$this->created_at->diffForHumans()??'',
			'updated_at' => '', //$this->updated_at->diffForHumans()??'',
			'artist_id' => $this->artist,
			'artwork' => $this->artwork,
		];
	}
}
