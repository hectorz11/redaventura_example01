<?php

class PostController extends \BaseController {

	public function index()
	{
		if (Input::has('title')) {
			$title = Input::get('title');

			$posts = Post::where('title','like','%'.$title.'%')->take(5)->get();

			return Response::json(['data' => $posts]);
		}
	}	
}