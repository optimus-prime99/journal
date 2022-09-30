<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
//use mysql_xdevapi\Session;
use Illuminate\Support\Facades\Session;
class PostRepository implements PostRepositoryInterface
{
//    public function all()
//    {
////        return $posts = Post::all();
//        return $posts = Post::latest()->paginate(5);
//    }
//
//    public function store(array $data)
//    {
//        // TODO: Implement store() method.
//
////        return Post::create([
////            'name' => $data['name'],
////            'description' => $data['description'],
////        ]);
//        $post = Post::create([
//            'name' => $data['name'],
//            'description' => $data['description'],
//        ]);
//
//        session()->flash('post-created-message', 'Post with name '.$data['name'].' was created');
//
//        return $post;
//
//    }
//
//    public function show(int $id)
//    {
//        // TODO: Implement show() method.
//        $post = Post::find($id);
//        if (!$post) {
//            abort(404);
//        }
//        return $post;
//    }
//
//    public function edit(int $id)
//    {
//        // TODO: Implement edit() method.
//        $post = Post::find($id);
//        if (!$post) {
//            abort(404);
//        }
//        return $post;
//    }
//
//    public function update(array $data, int $id)
//    {
//        // TODO: Implement update() method.
//        $post = Post::find($id);
//        if (!$post) {
//            abort(404);
//        }
//        $post->update([
//            'name' => $data['name'],
//            'description' => $data['description'],
//        ]);
//        Session::flash('post-updated-message', 'Post with name '.$post['name'].' was updated');
//        return $post;
//    }
//
//    public function delete($id)
//    {
//        // TODO: Implement delete() method.
//        $post = Post::find($id);
//        if (!$post) {
//            abort(404);
//        }
//        $post->delete();
//        Session::flash('message', 'Post was deleted');
//        return back();
//    }

    public function all()
    {
//        return $posts = Post::all();
        return $posts = Post::latest()->paginate(5);
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.

//        return Post::create([
//            'name' => $data['name'],
//            'description' => $data['description'],
//        ]);
//        $inputs = request()->validate([
//            'name' => 'required|min:8|max:255',
//            'description' => 'required',
//            'closed_at' => 'required'
//        ]);

        $post = Post::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'closed_at' => $data['closed_at']
        ]);
//        $inputs = request()->validate($post);
//        auth()->user()->posts()->create($inputs);
//
//            session()->flash('post-created-message', 'Post with name '.$data['name'].' was created');

        return $post;


//        session()->flash('post-created-message', 'Post with name '.$inputs['name'].' was created');
//        return $inputs;
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
            'closed_at' => $data['closed_at']
        ]);
        Session::flash('post-updated-message', 'Post with name '.$post['name'].' was updated');
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
        Session::flash('message', 'Post was deleted');
        return back();
    }

}
