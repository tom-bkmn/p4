<?php

class RepliesController extends BaseController {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    # Retrieve and present a list of topics
    public function getReplies($topicNumber) {
        return View::make('/replies')
        	   ->with('topicNumber', $topicNumber);  
    }

    # Create a reply.
    public function postReply($topicNumber) {
        return View::make('/createReply')
      	->with('topicNumber', $topicNumber);  
    }

    # Create a comment in the replies form.
    public function getCommentForm($replyNumber) {
       return View::make('/createComment')
     	->with('replyNumber', $replyNumber);  
    }

    # This is an action...
    public function postLogin() {


    }

}