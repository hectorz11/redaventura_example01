<?php

class User extends Eloquent {

	protected $table = 'users';

	protected $fillable = ['first_name', 'last_name', 'email', 'status'];

	protected $hidden = ['status'];

	public function posts()
	{
		return $this->hasMany('Post', 'user_id');
	}

}
