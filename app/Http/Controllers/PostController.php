<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

use function Laravel\Prompts\table;

class PostController extends Controller
{
    public function index() {
        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // バリデーションの実施
        $validatedData = $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200',
        ]);

        // 新しい投稿データを保存
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        // 保存後、投稿一覧ページにリダイレクト
        return redirect("/posts");
    }

}
