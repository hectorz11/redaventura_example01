<?php

class Post extends Eloquent {

	protected $table = 'posts';

	protected $fillable = ['title', 'body', 'user_id', 'status'];

	protected $hidden = ['status'];

	public function users()
	{
		return $this->belongTo('User', 'user_id');
	}
}