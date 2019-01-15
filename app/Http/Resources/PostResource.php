<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'image' => url(config('blog.uploads.webpath') . '/' . $this->page_image),
            'content' => $this->content_html,
            'author' => '学院君',
            'posted_at' => $this->publish_date,
            'views' => mt_rand(1, 100000),
            'votes' => mt_rand(1, 1000)
        ];
    }
}
