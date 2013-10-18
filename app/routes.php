<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


 Route::group(array('prefix' => LaravelLocalization::setLanguage() ), function()
{
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
            //return View::make('hello');
            return Redirect::route('user.login');
        });

        // ADD ROUTE FOR MEMBER LOGIN & REGISTERATION 
        Route::get('user/login', array('uses' => 'AuthController@getlogin' , 'as' => 'user.login'));
        Route::get('user/logout', array('uses' => 'AuthController@getlogout' , 'as' => 'user.logout'));
        Route::post('user/login', array('uses' => 'AuthController@postlogin' , 'as' => 'user.postlogin'));


        // ADD ROUTE FOR MEMBER REGISTERATION
        Route::get('user/register', array('uses' => 'AuthController@getRegister' , 'as' => 'user.register'));
        Route::post('user/register', array('uses' => 'AuthController@postRegister' , 'as' => 'user.postreg'));
        

        // Actiave Route Controller
        Route::get('user/activate/{userId}/{activationCode}', 'AuthController@getActivate');
        
        // Actiave Route Controller
        Route::get('user/resend',  'AuthController@getResend');
        Route::post('user/resend', 'AuthController@postResend');

        


        // ADD ROUTE FOR AUTHENCIATED USER INSIDE THIS group
        Route::group(array('before' => 'sentry'),function(){

            Route::get('user/profile', array('uses' => 'AuthController@profile' , 'as' => 'user.profile'));
            Route::get('user/settings',array('uses' => 'AccountController@index' ,'as'=>'user.settings'));

            Route::get('user/edit/profile',array('uses' => 'AccountController@editprofile' ,'as'=>'user.editprofile'));
            Route::put('user/edit/profile',array('uses' => 'AccountController@updateprofile' ,'as'=>'user.updateprofile'));
            
        });
        // End for sentry group
        
        Route::get('mytemplate',function(){
            return View::make('mytemplate');
        });

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

// Route::get('/', function()
// {
//  return View::make('hello');
// });
