<?php


namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    public  function index()
    {
        $PostsFromDB = Post::all();

        return view('posts.index', ['Posts' => $PostsFromDB]);
    }


    public function Show(Post $post)
    {

        return view('posts.post', ['post' => $post]);
    }



    public function create()
    {
        $users = User::all();

        return  view("posts.create", ['users' => $users]);
    }


    public function store()

    {
        request()->validate([
            'title' =>['required'],
            'discription' =>['required'],
            'creator'=> ['required','exists:users,id']
        ]);


        $post = new Post(request()->all());

        $post->save();
        return to_route('Posts.index');
    }


    public function  edit(Post $post)
    {
        $users = User::all();


        return view('posts.edit', ['users' => $users, 'post'=>$post]);
    }



    public function update($PostId)
    {
        request()->validate([
            'title' => ['required'],
            'discription' => ['required'],
            'creator' => ['required', 'exists:users,id']



        ]);


        $data = request()->all();
        $post = Post::find($PostId);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->user_id = $data['creator'];
        $post->save();

        return to_route('Posts.show', $PostId);
    }



    public function delete($PostId)

    {
        $post = Post::find($PostId);
        $post->delete();


        return to_route('Posts.index');
    }

    
}
