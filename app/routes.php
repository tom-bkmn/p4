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

Route::get('/', function()
{
	return View::make('hello');
});

/* Environment Support and Debug */
Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('mysql-test', function() {
    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

// DELETE THIS WHEN FINISHED
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
//***********************************************************
//     Application Routes Here
//***********************************************************
Route::get('/topics', function()
{
    $topics = DB::table('topics')->get();
    foreach ($topics as $topic) {
    //var_dump($topic);
        echo "Topic: " . $topic->topic_name . "<br>";
        echo "Description: " . $topic->topic_content . "<br>";
        $user = DB::table('users')->where('id', $topic->author_id)->first();
        echo "User name: " . $user->user_name . "<br>";
        echo "<br>";
        echo "<br>";
    }
      return View::make('/topics');
});

Route::get('/createTopic', function()
{
    return View::make('/createTopic');
    
});

Route::post('/createTopic', 
    array(
    //    'before' => 'csrf', 
        function() {
	    $data = Input::all();
           // var_dump($data);

            echo "Here is the author id:  ".Auth::user()->id;
            echo "Here is the Title ".$data['topicTitle'];
            
            $topic = new Topic;
            $topic['topic_name'] = $data['topicTitle'];
            $topic['topic_content'] = $data['topicDescription'];
            $topic->author()->associate(Auth::user()); # <--- Associate the author with this Topic
            $topic->save();   
            return Redirect::to('/topics');
        }
    )
);
//***********************************************************
//        LOGIN AND AUTHENTICATION ROUTES HERE
//***********************************************************
Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->user_name = Input::get('user_name');

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/list')->with('flash_message', 'Welcome to Foobooks!');

        }
    )
);

Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);

Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/debug')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('/topics');
        }
    )
);


Route::get('/logout', function() {

    # Log out
    Auth::logout();
    
    echo "you are loggd out";

    # Send them to the homepage
    return Redirect::to('/login');

});

Route::get('/list/{format?}', 
    array(
        'before' => 'auth', 
        function($format = 'html') {
            echo "I think this is the right answer.";
        }
    )
);
