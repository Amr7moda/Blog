<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'user_id' => $user->id,
            // 'category_id' => $request->category_id

        ]);

        $show = Post::get();
        $social = Social::get();

        return view('post.show', compact('social', 'show'));
    }

    public function post_show()
    {
        $show = Post::get();
        $social = Social::get();

        return view('post.show', compact('social', 'show'));
    }

    public function likes($userid, $postid)
    {
        $social = DB::table('socials')
            ->where('post_id', '=', $postid)
            ->first();
        if (empty($social)) {
            $social = new Social([
                'user_id' => $userid,
                'post_id' => $postid,
                'likes_counter' => +1,
            ]);
            $social->save();
        } else {
            DB::table('socials')
                ->where('post_id', '=', $postid)
                ->limit(1)
                ->increment('likes_counter', 1);
        }

        $show = Post::get();
        $social = Social::get();

        return view('post.show', compact('social', 'show'));
    }
}
