<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;

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
        $publication_date = new DateTime($this->publication_date);

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'author'            => $this->author,
            'status'            => $this->status,
            'user_borrow'       => $this->user_borrow,
            'category_id'       => $this->category_id,
            'publication_date'  => $publication_date->format('d-m-Y'),
        ];
    }
}
