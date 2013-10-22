<?php

class AccountController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('user.accounts.index');
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
	

	public function editprofile()
	{
		$dobday   = $this->getDay();
		$dobmonth = $this->getMonth();

	
		$user = Sentry::getUser();
		$dob =explode('-', $user['dob']);
		return View::make('user.accounts.editprofile')->with('user',$user)
													  ->with('dobday',$dobday)
													  ->with('dobmonth',$dobmonth)
													  ->with('dob',$dob);

	}

	public function updateprofile()
	{	

		if (Input::hasFile('profilepic'))
		{	 
			 $file=Input::file('profilepic');
			 $filename = str_random(6) . '_' . $file->getClientOriginalName();
			 $destinationPath ='img/profile/'.$filename;
			 Image::make(Input::file('profilepic')->getRealPath())->resize(81, 82)->save($destinationPath);
		   
		}
		else
		{
			$destinationPath = Input::get('imageurl');
		}
		try
			{

				$credentials = array(
				 'email' 		=> Input::get('email')  ,
				 'first_name' 	=> Input::get('firstname'),
				 'last_name'	=> Input::get('lastname') ,
				
				 'address' 		=> Input::get('address') ,
				 'gender' 		=> Input::get('gender'),
				 'city' 		=> Input::get('city') ,
				 'imageurl' 	=> URL::asset($destinationPath)
			   );


			    // Find the user using the user id
			    $user = Sentry::findUserByLogin($credentials['email']);

			    // Update the user details
			    $user->last_name = $credentials['last_name'];
			    $user->first_name = $credentials['first_name'];
			    $user->city = $credentials['city'];
			    $user->gender = $credentials['gender'];
			    $user->address = $credentials['address'];
			    $user->imageurl = $credentials['imageurl'];

			    // Update the user
			    if ($user->save())
			    {
			    	Session::flash('success', 'Your account information has been successfully updated.');
		    	
			       	return Redirect::to('user/profile');
			    }
			    else
			    {
			        // User information was not updated
			    }
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    echo 'User with this login already exists.';
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    echo 'User was not found.' . $credentials['email'];
			}
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function editpass()
	{
		$user = Sentry::getUser();
        return View::make('user.accounts.editpassword')->with('user',$user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function updatepass()
	{
		$rules = array(
			 'password' 	=> 'Required|AlphaNum|Between:4,26|Confirmed',
			 'currentpass' 	=> 'Required|AlphaNum|Between:4,26',
			 'password_confirmation' => 'Required|AlphaNum|Between:4,26'
		);


		$validator = Validator::make(Input::all(), $rules);	
		
		if($validator->fails()){

			return Redirect::to('user/editpassword')->withErrors($validator->messages())->withInput();

		}
		else{
			    try
					{
						$credentials = array(
							 'uid' 			=> Input::get('userid'),
							 'currentpass' 	=> Input::get('currentpass')  ,
							 'password' 	=> Input::get('password')  ,
					   );

					   	// Find the user using the user id
			    		$user = Sentry::findUserByID($credentials['uid']);

					    if($user->checkPassword($credentials['currentpass']))
					    {
					        
							$resetCode = $user->getResetPasswordCode();
							 // Attempt to reset the user password
					        if ($user->attemptResetPassword($resetCode, $credentials['password']))
					        {
					          	Session::flash('success', 'Your new password has been changed !');
			       				return Redirect::to('user/profile');
					        }
					     
					    }
					    else
					    { 
					        Session::flash('error', 'Your Current Password does not match. !');
					        return Redirect::to('user/editpassword');
					    }
					}
				
					catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
					{
					   Session::flash('error', 'User was not found !');
					   return Redirect::to('user/editpassword');
					}

		}
	}

}
