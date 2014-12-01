<?php

class UsersController extends BaseController {


    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    # Retrieve the signup panel
    public function signup() {
        'before' => 'guest',
        function() {
             return View::make('signup');
        }
    }

    # Retrieve the view to create a topic
    public function createTopic() {
        return View::make('/createTopic');
    }

    # Create a topic                      var_dump($data);
    public function postTopic() {
           $data = Input::all();
            $topic = new Topic;
            $topic['topic_name'] = $data['topicTitle'];
            $topic['topic_content'] = $data['topicDescription'];
            $topic->author()->associate(Auth::user()); # <--- Associate the author with this Topic
            $topic->save();   
            return Redirect::to('/topics');
    }


    # This is an action...
    public function postLogin() {


    }

}
