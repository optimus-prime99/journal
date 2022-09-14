<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
//        return $posts = Post::all();
        return $posts = Post::latest()->paginate(5);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
        return Post::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }

    public function show(int $id)
    {
        // TODO: Implement show() method.
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return $post;
    }

    public function edit(int $id)
    {
        // TODO: Implement edit() method.
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return $post;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return $post;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->delete();
    }
}
