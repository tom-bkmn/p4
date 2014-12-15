<?php

//***********************************************************
//                APPLICATION ROUTES
//***********************************************************
// TOPICS
Route::get('/', 'TopicsController@getTopics');
Route::get('/topics', 'TopicsController@getTopics');
Route::get('/topicForm', 'TopicsController@getTopicForm');
Route::post('/createTopic', 'TopicsController@postTopic');
Route::get('/deleteForm/{topicNumber}', 'TopicsController@getDeleteForm');
Route::delete('/delete/{topicNumber}', 'TopicsController@destroy');

// REPLIES
Route::get('/replies/{topicNumber}', 'RepliesController@getReplies');
Route::get('/replyForm/{topicNumber}', 'RepliesController@getReplyForm');
Route::post('/createReply', 'RepliesController@postReply');
Route::get('/editForm/{replyNumber}', 'RepliesController@editForm');
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


