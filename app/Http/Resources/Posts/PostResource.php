<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'slug' => $this->slug,
            'image' => $this->image->path,
            'author' => $this->author->name,
            'comnents_count' => $this->comments_count,
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
