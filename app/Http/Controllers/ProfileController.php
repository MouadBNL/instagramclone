<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Display the specified profile.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;
        
        return view('profile.show', [
            'user' => $user,
            'follows' => $follows
        ]);
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $this->authorize('update', auth()->user()->profile);
        return view('profile.edit');
    }

    /**
     * Update the specified profile in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->authorize('update', auth()->user()->profile);
        $data = request()->validate([
            'title' => ['string', 'nullable'],
            'image' => ['image', 'nullable'],
            'desc' => ['string', 'nullable'],
            'link' => ['url', 'nullable'],
        ]);
        $name = request()->validate([
            'name' => ['required', 'string'],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/".$imagePath))->fit(1000, 1000);
            $image->save();
            $data = array_merge($data, ['image' => $imagePath]);
        }
        auth()->user()->profile()->update($data);
        auth()->user()->update($name);
        return redirect(route('home'));
    }

}
