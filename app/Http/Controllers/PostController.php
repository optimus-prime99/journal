<?php

namespace App\Http\Controllers;

use App\Events\DeletePost;
use App\Events\NewPost;
use App\Events\UpdatePost;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post;

    function __construct(PostRepositoryInterface $interface)
    {
        $this->post = $interface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

//    public function index()
//    {
//        $posts = $this->post->all();
//        return view('posts.index', ['posts' => $posts], compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
//    }

        public function index()
        {
//            $posts = Post::all();
//            return view('admin.posts.index');
            $posts = auth()->user()->posts;

            return view('admin.posts.index', ['posts'=>$posts]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
//        return view('posts.create');
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function store(Request $request)
//    {
//        $post = $this->post->store($request->all());
//        $id = $post->id;
//        event(new NewPost($post));
//        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
//    }

    public function store(){
         $inputs = request()->validate([
            'name' => 'required|min:8|max:255',
            'description' => 'required'
        ]);

         auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post with name '.$inputs['name'].' was created');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//        $post = $this->post->show($id);
//        return view('posts.show', ['post' => $post]);
//    }

    public function show(Post $post)
    {
        //
//        $post = $this->post->show($id);
//        return view('posts.show', ['post' => $post])

        return view('blog-post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $post = $this->post->edit($id);
//        return view('posts.edit', ['post' => $post]);
//    }
    public function edit(Post $post){

//        $this->authorize('view', $post);


        return view('admin.posts.edit', ['post' => $post]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function update(Request $request, $id)
//    {
//        $post = $this->post->update($request->all(), $id);
//        event(new UpdatePost($post));
//        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
//    }

        public function update(Post $post)
        {
            $inputs = request()->validate([
                'name' => 'required|min:8|max:255',
                'description' => 'required'
            ]);

            $post->name = $inputs['name'];
            $post->description = $inputs['description'];

            $post->save();

            session()->flash('post-updated-message', 'Post with name '.$inputs['name'].' was updated');

            return redirect()->route('post.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        $this->post->delete($id);
        event(new DeletePost($id));
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
