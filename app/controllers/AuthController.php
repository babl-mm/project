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
				// if($user)
				// {
					if($user->hasAccess('admin'))
					{
						return Redirect::to('/');
					}
					else
					{
						return Redirect::to('user/profile');
					}
				// }
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
			    Session::flash('error', 'You have not yet activated this account. <a href="/user/resend">Resend actiavtion?</a>');
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
		$dobday = $this->getDay();
		$dobmonth = $this->getMonth();
		
		return View::make('user.auth.register')->with('dobday',$dobday)->with('dobmonth',$dobmonth);
	}

	public function getDay()
	{
		$day= array();
		$day[0] = "Choose Day ~";

		for ($i=1; $i <= 31; $i++) { 
			$day[]= $i;
		}
		return $day;
	}

	public function getMonth()
	{
		$month= array('Choose Month ~','January','Febuary','March','April','May','June','July','August'
					 ,'September','October','November','December');
	
		return $month;
	}
	
	/**
	 * Post Registration Form
	 *
	 * @return Response
	 */
	public function postRegister()
	{
		$myday = array();
		for ($i = 1; $i <= 31 ; $i++) { 
			$myday[$i] = $i;
		}
		$rules = array(
			 'email' 		=> 'Required|Between:3,64|Email' ,
			 'password' 	=> 'Required|AlphaNum|Between:4,26|Confirmed',
			 'password_confirmation' => 'Required|AlphaNum|Between:4,26',
			 'firstname' 	=> 'Required',
			 'lastname'		=> 'Required',
			 'dob_day' 		=> 'Required|in:'.implode(',', $myday),
			 'dob_month' 	=> 'Required|in:1,2,3,4,5,6,7,8,9,10,11,12',
			 'phone' 		=> 'Required|Numeric',
			 'address' 		=> 'Required',
			 'gender' 		=> 'Required',
			 'city' 		=> 'Required'
		);


		$validator = Validator::make(Input::all(), $rules);	
		
		if($validator->fails()){

			return Redirect::to('user/register')->withErrors($validator->messages())->withInput();

		}
		else{
			try {

				$credentials = array(
				 'email' 		=> Input::get('email')  ,
				 'password' 	=> Input::get('password') ,
				 'first_name' 	=> Input::get('firstname'),
				 'last_name'	=> Input::get('lastname') ,
				 'phoneno' 		=> Input::get('phone'),
				 'dob' 			=> Input::get('dob_month') . '-' . Input::get('dob_day'),
				 'address' 		=> Input::get('address') ,
				 'gender' 		=> Input::get('gender'),
				 'city' 		=> Input::get('city') ,
				 'imageurl' 	=> 'img/profile/sample_profile.jpg'	
			   );

				$user = Sentry::register($credentials);
				$data['activationCode']= $user->GetActivationCode();
				$data['email']= $credentials['email'];
				$data['userId']= $user->getId();
				
				//send email with link to activate.
				Mail::send('emails.auth.welcome', $data, function($mail) use($data)
				{
				    $mail->to($data['email'])->subject('Welcome to Beeticket Registration');
				});
				
				Session::flash('success', 'Your account has been created. Check your email for the confirmation link.');
		    	
		    	return Redirect::to('user/login');
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

		/**
	 * Show the 'Resend Activation' Form
	 * @return View
	 */
	public function getResend()
	{
		//Show the Resend Activation Form
		return View::make('user.resend');
	}

	/**
	 * Process Resend Activation Request
	 * @return View
	 */
	public function postResend()
	{

		// Gather Sanitized Input
		$input = array(
			'email' => Input::get('email')
			);

		// Set Validation Rules
		$rules = array (
			'email' => 'required|min:4|max:32|email'
			);

		//Run input validation
		$v = Validator::make($input, $rules);

		if ($v->fails())
		{
			// Validation has failed
			return Redirect::to('user/resend')->withErrors($v)->withInput();
		}
		else 
		{

			try {
				//Attempt to find the user. 
				$user = Sentry::getUserProvider()->findByLogin(Input::get('email'));


				if (!$user->isActivated())
				{
					//Get the activation code & prep data for email
					$data['activationCode'] = $user->GetActivationCode();
					$data['email'] = $input['email'];
					$data['userId'] = $user->getId();

							//send email with link to activate.
					Mail::send('emails.auth.welcome', $data, function($mail) use($data)
					{
					    $mail->to($data['email'])->subject('Welcome to Beeticket Registration');
					});

					//success!
			    	Session::flash('success', 'Check your email for the confirmation link.');
			    	return Redirect::to('/');
				}
				else 
				{
					Session::flash('error', 'That account has already been activated.');
			    	return Redirect::to('/');
				}

			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    Session::flash('error', 'Login field required.');
			    return Redirect::to('user/resend')->withErrors($v)->withInput();
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    Session::flash('error', 'User already exists.');
			    return Redirect::to('user/resend')->withErrors($v)->withInput();
			}


		}


	}
}