<?php

class UserController extends BaseController {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    # Retrieve signup form
    public function getSignup() {
        return View::make('signup');
    }

    # Retrieve login form
    public function getLogin() {
        return View::make('login');
    }

    # Post signup.  This uses validation.
    public function postSignup(){
        #  Define the rules
        $rules = array(
            'email' => 'required|email|unique:users,email',
        #    'password' => 'required|min:4',
            'user_name' => 'required');

        # Step 2)
            $validator = Validator::make(Input::all(), $rules);

        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Sign up failed; please fix the errors listed below.')
                ->withInput()
                ->withErrors($validator);
        }

        $user = new User;
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->user_name = Input::get('user_name');
       # $user->is_admin = false;

        # Try to add the user 
        $user->save();

        # Log the user in
        Auth::login($user);

        return Redirect::to('/topics')->with('flash_message', 'Welcome to TBen\'s Blogs');
    }


    # This is an action...
    public function postLogin() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/topics')->with('flash_message', 'Welcome back ' . Auth::user()->user_name);
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Oops! Log in failed; please try again. Either the email or password were incorrect.')->withInput();
            }

            return Redirect::to('/topics');
    }

    # Retrieve login form
    public function getLogout() {
        Auth::logout();
        # Send them to the login.
        return Redirect::to('/login');
    }

}
