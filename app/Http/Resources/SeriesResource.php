<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
 public function toArray($req)
    {
        return [
          'id'=>$this->id,
          'title'=>$this->title,
          'description'=>$this->description,
          'cover_image'=> $this->cover_image ? asset('storage/'.$this->cover_image) : null,
          'status'=>$this->status,
          'categories'=> $this->whenLoaded('categories', fn()=>$this->categories->pluck('name')),
          'episodes'=> EpisodeResource::collection($this->whenLoaded('episodes')),
        ];
    }
}
