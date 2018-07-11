<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCommentsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'article',
            'id' => (string)$this->id,
            'attributes' => [
                'title' => $this->title,
                'content' => $this->body,
            ],
            'comments' => new ArticleCommentsResource($this->comments),
        ];
    }
}
