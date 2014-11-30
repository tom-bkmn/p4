<?php

class TopicsController extends BaseController {


    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    # Retrieve and present a list of topics
    public function getTopics() {
        $topics = DB::table('topics')->get();
        return View::make('/topics')
        	   ->with('topics', $topics);
    }

    # This is an action...
    public function postSignup() {


    }

    # This is an action...
    public function getLogin() {


    }

    # This is an action...
    public function postLogin() {


    }

}
