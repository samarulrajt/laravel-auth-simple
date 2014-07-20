<?php

/**
*  
*/
class UsersController extends BaseController
{
	
	protected $layout = "layouts.main";

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	public function getRegister() {
		if (Auth::check())
		{
    		return Redirect::to('users/dashboard');
		}else{
			$this->layout->content = View::make('users.register');
		}
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
	
			//send mail to users
			Mail::send('users.mails.welcome', array('firstname'=>Input::get('firstname')), function($message){
					$message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to the Laravel 4 Auth App!');
			});
			
			
			return Redirect::to('users/login')->with(array('message'=>'Thanks for registering!','success'=>1));
		} else {
			return Redirect::to('users/register')->with(array('message' => 'The following errors occurred','success'=>0))->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		if (Auth::check())
		{
    		return Redirect::to('users/dashboard');
		}else{
			$this->layout->content = View::make('users.login');
		}
		
	}

	public function postSignin() {
	
		if(Input::get('remember_me') =='remember_me'){
			$stay = true ;
			
		}else{
			$stay = false ;
		}
		
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')), $stay)) {
			
			return Redirect::to('users/dashboard')->with(array('message'=>'You are now logged in!','success'=>1));
		} else {
			return Redirect::to('users/login')
				->with(array('message'=>'Your username/password combination was incorrect','success'=>0))
				->withInput();
		}
	}

	public function getDashboard() {
		$data = Session::all();
		$email = Auth::user()->email;
		$id = Auth::id();
		$name = $email = Auth::user()->firstname;
		
		$this->layout->content = View::make('users.dashboard');
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with(array('message' => 'Your are now logged out!','success'=>0));
	}

}

?>
