<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        return view('web.home');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function profile($id)
    {
        $users = User::where('id', $id)->get();
        $posts = Post::where('user_id', $id)->get();
        return view('web.profile', compact('users', 'posts'));
    }

    public function dashboard()
    {
        // $posts = Post::get('user_id');
        // dd($posts('user_id'));
        // if ($posts == Auth::user()->id) {
        //     $show = Post::get();
        //     return view('web.dashboard', ['show' => $show]);
        // } else {
            $show = Post::get();
            return view('web.dashboard', ['show' => $show]);
        // }
    }
}
