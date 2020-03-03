<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show all the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $users = auth()->user()->following()->pluck('profiles.user_id');
            $posts =Post::whereIn('user_id', $users)->with('user')->latest()->paginate(30);
            return view('home', [
                'posts' => $posts
            ]);
        }
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'caption' => ['string', 'nullable'],
            'image' => ['required', 'image'],
        ]);

        $data['image'] = request('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/".$data['image']))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create($data);
        
        return redirect(route('profile.show', auth()->user()->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;

        return view('post.show', [
            'post' => $post,
            'follows' => $follows
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
