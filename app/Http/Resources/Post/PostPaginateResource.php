<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostPaginateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //  "email" => $this->email,
            "data" => PostResource::collection($this->items()),
            'pagination' => [
                'total'         => $this->total(),
                'per_page'      => $this->perPage(),
                'current_page'  => $this->currentPage(),
                'last_page'     => $this->lastPage(),
                'from'          => $this->firstItem(),
                'to'            => $this->lastItem()
            ]
        ];
    }

}
