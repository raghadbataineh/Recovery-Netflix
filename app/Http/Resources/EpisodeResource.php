<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    public function toArray($req)
    {
        return [
          'id'=>$this->id,
          'title'=>$this->title,
          'description'=>$this->description,
          'video_url'=>$this->video_url,
          'duration'=>$this->duration,
          'release_date'=>optional($this->release_date)->toDateString(),
        ];
    }
}
