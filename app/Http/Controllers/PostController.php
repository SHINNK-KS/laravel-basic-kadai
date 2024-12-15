<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class PostController extends Controller
{
    public function index() {
        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
        
    }
}
