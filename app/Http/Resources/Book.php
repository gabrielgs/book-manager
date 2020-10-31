<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'author'        => $this->author,
            'status'        => $this->status,
            'user_borrow'   => $this->user_borrow,
            'category_id'   => $this->category_id,
            'created'       => $this->created_at->diffForHuman(),
        ];
    }
}
