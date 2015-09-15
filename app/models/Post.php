<?php

class Post extends Eloquent {

	protected $table = 'posts';

	protected $fillable = ['title', 'image_url', 'body', 'user_id', 'status'];

	protected $hidden = ['status'];

	public function users()
	{
		return $this->belongTo('User', 'user_id');
	}

	public static function createPost($input)
	{
		$answer = [];
		$rules = [
			'title' => 'required',
			'body' => 'required',
			'user_id' => 'required|integer',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation->errors()->getMessages();
			$answer['error'] = true;
		} else {
			$post = new Post;
			$post->title = Input::get('title');
			$post->image_url = Input::get('image_url');
			$post->body = Input::get('body');
			$post->user_id = Input::get('user_id');
			$post->status = 1;

			if ($post->save()) {
				$answer['message'] = 'Creado con exito!';
				$answer['error'] = false;
				$answer['data'] = $post;
			} else {
				$answer['message'] = 'CREATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}

	public static function updatePost($input, $id)
	{
		$answer = [];
		$rules = [
			'title' => 'required',
			'body' => 'required',
			'user_id' => 'required|integer',
		];
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation->errors()->getMessages();
			$answer['error'] = true;
		} else {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->image_url = Input::get('image_url');
			$post->body = Input::get('body');
			$post->user_id = Input::get('user_id');

			if ($post->save()) {
				$answer['message'] = 'Editado con exito!';
				$answer['error'] = false;
				$answer['data'] = $post;
			} else {
				$answer['message'] = 'UPDATE error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}