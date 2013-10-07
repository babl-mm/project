<?php

class AuthController extends \BaseController {

	public function __construct()
	{
		// CSRF Protection
		$this->beforeFilter('csrf',array('on'=>'post'));
		//Enable the throttler.  [I am not sure about this...]
		// Get the Throttle Provider
		$throttleProvider = Sentry::getThrottleProvider();

		// Enable the Throttling Feature
		$throttleProvider->enable();
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
			'email' => 'required|min:8',
			'password' => 'required|min:3'
		);

		$validator = Validator::make($credentials, $rules);	

		if($validator->fails())
		{
			return Redirect::to('user/login')->withErrors($validator->messages())->withInput();
		}
		else
		{
			// If you're using our Eloquent models (which we ship with Sentry by default)
			$phoneModelInstance = Sentry::getUserProvider()->getEmptyUser();

			// Get User By Eloquent Models By Emailmodelinstance
			$phoneUser = $phoneModelInstance->where('phoneno', '=', Input::get('email'))->first();
			
			if($phoneUser)
			{
				$credentials =array(
					'email' => $phoneUser->email,
					'password' => Input::get('password')
					);
			}

			try 
			{
				$user =	Sentry::authenticate($credentials, false);
				if($user)
				{
					return Redirect::to('user/profile');
				}
			} 
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    // Sometimes a user is found, however hashed credentials do
			    // not match. Therefore a user technically doesn't exist
			    // by those credentials. Check the error message returned
			    // for more information.
			    Session::flash('error', 'Invalid username or password.' );
				return Redirect::to('user/login')->withInput();;
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    Session::flash('error', 'You have not yet activated this account. <a href="/users/resend">Resend actiavtion?</a>');
				return Redirect::to('user/login')->withInput();;
			}

			// The following is only required if throttle is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    $time = $throttle->getSuspensionTime();
			    Session::flash('error', "Your account has been suspended for minutes.");
				return Redirect::to('user/login')->withInput();;
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    Session::flash('error', 'You have been banned.');
				return Redirect::to('user/login')->withInput();;
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
		
		Sentry::logout();
		
		return Redirect::to('user/login');
	}
	/**
	 * Get Registration Form
	 *
	 * @return Response
	 */
	public function getRegister()
	{
		return View::make('user.auth.register');
	}

	/**
	 * Post Registration Form
	 *
	 * @return Response
	 */
	public function postRegister()
	{
		$credentials = array(
			 'email' 		=> Input::get('email')  ,
			 'password' 	=> Input::get('password') ,
			 'first_name' 	=> Input::get('firstname'),
			 'last_name'	=> Input::get('lastname') ,
			 'phoneno' 		=> Input::get('phone'),
			 'dob' 			=> Input::get('dob') ,
			 'address' 		=> Input::get('address') ,
			 'gender' 		=> Input::get('gender'),
			 'city' 		=> Input::get('city')	
		);

		$rules = array(
			 'email' 		=> 'required|email' ,
			 'password' 	=> 'required',
			 'first_name' 	=> 'required',
			 'last_name'	=> 'required',
			 'dob' 			=> 'required',
			 'phoneno' 		=> 'required',
			 'address' 		=> 'required',
			 'gender' 		=> 'required',
			 'city' 		=> 'required'
		);
		$validator = Validator::make($credentials, $rules);	
		if($validator->fails())
		{
			return Redirect::to('user/register')->withErrors($validator->messages())->withInput();

		}
		else{
			try {
				$user = Sentry::register($credentials);
				$code= $user->GetActivationCode();
				return View::make('testing')->with('code',$code)->with('userid',$user->getId());
			} 
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    Session::flash('error', 'Login field required.');
			    return Redirect::to('user/register')->withInput();
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    Session::flash('error', 'User already exists. Please choose another email address');
			    return Redirect::to('user/register')->withInput();
			}
		}
	}
	/**
	 * Get Activate Form
	 *
	 * @return Response
	 */
	public function getActivate($userId = null , $activationCode = null)
	{
		
		try 
		{
		    // Find the user
		    $user = Sentry::getUserProvider()->findById($userId);

		    // Attempt user activation
		    if ($user->attemptActivation($activationCode))
		    {
		        // User activation passed
		        
		    	//Add this person to the user group. 
		    	$userGroup = Sentry::getGroupProvider()->findById(1);
		    	$user->addGroup($userGroup);

		        Session::flash('success', 'Your account has been activated. <a href="/user/login">Click here</a> to log in.');
				return Redirect::to('user/login');
		    }
		    else
		    {
		        // User activation failed
				return Redirect::to('user/register')->withErrors(array('problem' => 'There was a problem activating this account. Please contact the system administrator'));
		    }
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    Session::flash('error', 'User does not exist.');
			return Redirect::to('user/login');
		}
		catch (Cartalyst\SEntry\Users\UserAlreadyActivatedException $e)
		{
		    Session::flash('error', 'You have already activated this account.');
			return Redirect::to('user/login');
		}
	}
}