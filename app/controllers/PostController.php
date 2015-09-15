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

	

	public function store()
	{
		$answer = Post::createPost(Input::all());
		if ($answer['error'] == true) {
			return Response::json(['message' => $answer['message']]);
		} else {
			return Response::json(['message' => $answer['message']]);
		}
	}

	public function show($id)
	{
		$post = Post::find($id);
		if ($post) {
			return Response::json(['data' => $post]);
		} else {
			return Response::json(['error' => true, 'description' => 'no existe!']); 
		}
	}

	public function update($id)
	{
		$answer = Post::updatePost(Input::all(), $id);
		if ($answer['error'] == true) {
			return Response::json(['message' => $answer['message']]);
		} else {
			return Response::json(['message' => $answer['message']]);
		}
	}
}