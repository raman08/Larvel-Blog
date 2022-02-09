<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public function store(Post $post, Request $request) {


		if ($post->likedBy($request->user())) {
			return response(null, 409);		
		}

		$post->like()->create([
			'user_id' => $request->user()->id,
		]);


		return back();
	}

	public function destroy(Post $post, Request $request) {
		$request->user()->like()->where('post_id', $post->id)->delete();

		return back();
	}
}
