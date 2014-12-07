<?php

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
//                APPLICATION ROUTES
//***********************************************************
// TOPICS
Route::get('/topics', 'TopicsController@getTopics');
Route::get('/createTopic', 'TopicsController@createTopic');
Route::post('/createTopic', 'TopicsController@postTopic');
Route::get('/delete/{topicNumber}', 'TopicsController@deleteTopic');
Route::delete('/delete/{topicNumber}', 'TopicsController@destroy');

// REPLIES
Route::get('/replies/{topicNumber}', 'RepliesController@getReplies');
Route::get('/createReply/{topicNumber}', 'RepliesController@createReply');
Route::post('/createReply', 'RepliesController@postReply');
Route::get('/editReply/{replyNumber}', 'RepliesController@editReply');
Route::put('/editReply/{replyNumber}', 'RepliesController@update');

// COMMETNTS 
// Because comments are part of the replies page, they use the reply controller
Route::get('/createComment/{replyNumber}', 'RepliesController@getCommentForm');
Route::post('/createComment', 'RepliesController@postComment');

//***********************************************************
//        LOGIN AND AUTHENTICATION ROUTES HERE
//***********************************************************
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


