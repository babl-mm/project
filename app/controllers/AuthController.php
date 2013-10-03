<?php

class AuthController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('csrf',array('on'=>'post'));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getlogin()
	{
		
		return View::make('user.auth.login');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postlogin()
	{
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:3'
		);
		$validator = Validator::make($credentials, $rules);	

		if($validator->fails())
		{
			return Redirect::to('user/login')->withErrors($validator->messages())->withInput();
		}
		else
		{
			try 
			{
				$user =	Sentry::authenticate($credentials, false);
				if($user)
				{
					return Redirect::to('user/profile');
				}
			} catch (Exception $e) {
				return Redirect::to('user/login')->withErrors(array('login' =>'Email and Password does not match'));
			}
		
		}
	}
	
	/**
	 * User Profile for Autheicated User
	 *
	 * @return Response
	 */
	public function profile()
	{
		 $user = Sentry::getUser();
		return View::make('user.profile.index')->with('user',$user);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getlogout()
	{
		if (Sentry::check())
		{
			Sentry::logout();
		}
		return Redirect::to('user/login');
	}

}