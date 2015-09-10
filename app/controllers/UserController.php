<?php

class UserController extends \BaseController {

	public function index()
	{
		$users = User::all();
		return Response::json(['users' => $users]);
	}

}