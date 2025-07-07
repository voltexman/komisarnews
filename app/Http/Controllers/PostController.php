<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function list(): View
    {
        return view('post.list');
    }

    public function show(string $slug): View
    {
        $post = Post::firstWhere(
            [
                'is_published' => Post::PUBLISHED,
                'slug' => $slug,
            ]
        );

        return view(['post.show', [
            'post' => $post,
        ]);
    }
}
