<?php

class RepliesController extends BaseController {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    ########################################
    #
    #    These are the methods for Replies
    #
    ########################################
    # Retrieve and present a list of Replies
    public function getReplies($topicNumber) {
        return View::make('/replies')
        	   ->with('topicNumber', $topicNumber);  
    }

    # Retrieve the view, including the form, to create a reply .
    public function createReply($topicNumber) {
        return View::make('/createReply')
      	->with('topicNumber', $topicNumber);  
    }

    # Post a reply to a topic
    public function postReply() {
            $data = Input::all();
            $reply = new Reply;
            $reply['content'] = $data['replyContent'];
            $reply['topic_id'] = $data['topicNum'];
            $reply->author()->associate(Auth::user()); # <--- Associate the author with this Reply
            $reply->save();   
            return Redirect::to('/replies/'.$data['topicNum']);
    }

    # This is an action...
    public function editReply($replyNumber) {
        return View::make('/editReply')
      	->with('replyNumber', $replyNumber);  
    }

    public function update($replyNumber) {
        echo "Update a reply here " . $replyNumber;
    }

    ########################################
    #
    #    These are the methods for Comments
    #
    ########################################
    # Create a comment in the replies form.
    public function getCommentForm($replyNumber) {
        return View::make('/createComment')
     	->with('replyNumber', $replyNumber);  
    }

    # Post a comment to a reply
    public function postComment() {
            $data = Input::all();
            $comment = new Comment;
            $comment['content'] = $data['commentContent'];
            $comment['reply_id'] = $data['replyNum'];
            $comment->author()->associate(Auth::user()); # <--- Associate the author with this Comment
            $comment->save();   
            return Redirect::to('/replies/'.$data['topicNum']);        
    }

}