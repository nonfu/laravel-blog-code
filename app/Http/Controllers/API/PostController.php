<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // 每页显示5条记录
        $posts = Post::orderBy('published_at', 'desc')->simplePaginate(5);
        $items = [];
        foreach ($posts->items() as $post) {
            $item['id'] = $post->id;
            $item['title'] = $post->title;
            $item['summary'] = $post->subtitle;
            $item['thumb'] = url(config('blog.uploads.webpath') . '/' . $post->page_image);
            $item['posted_at'] = $post->publish_date;
            $item['views'] = mt_rand(1, 10000); // 暂时没有实现文章浏览数逻辑，返回随机数
            $items[] = $item;
        }
        $data = [
            'message' => 'success',
            'articles' => $items
        ];
        return response()->json($data);
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }
}
