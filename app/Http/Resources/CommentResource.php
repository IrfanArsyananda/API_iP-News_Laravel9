<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'comment_id' => $this->id,
            'post' => $this->whenLoaded('post'),
            'user' => $this->whenLoaded('writer'),
            'content' => $this->content,
            'created_at' => date_format($this->created_at, "Y-m-d H:i:s"),
            'updated_at' => date_format($this->updated_at, "Y-m-d H:i:s")
        ];
    }
}
