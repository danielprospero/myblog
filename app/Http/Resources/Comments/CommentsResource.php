<?php

namespace App\Http\Resources\Comments;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->the_comment,
            'created_at' => $this->created_at->format('d M Y'),
            'user' => $this->user,
        ];
    }
}
