<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post_create()
    {
        $categories = Category::get();
        return view('post.post', ['categories' => $categories]);
    }

    public function post_store(Request $request)
    {
        if ($request->image != null) {
            $name = $request->image->getClientOriginalName();
            $request->image->move('uploads/', $name);
        } else {
            $name = '';
        }
        $user = Auth::user();
        Post::create([
            'title' => $request->title,
            'descripton' => $request->description,
            'image' => $name,
            'date' => $request->date,
            'user_id' => $user->id,
            'category_id' => $request->category_id

        ]);

        return redirect('home');
    }

    public function post_show()
    {
        $show = Post::get();
        return view('post.show', ['show' => $show]);
    }
}
