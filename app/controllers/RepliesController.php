<?php

class RepliesController extends BaseController {

    public function __construct() {
        // Call parent constructor for csrf filter    
        parent::__construct();
        
        // Do not allow the user to access Topic routes if they aren't logged in
        $this->beforeFilter('auth', array());
    }

    ########################################
    #
    #   These are the methods for Replies
    #
    ########################################
    
    # Retrieve and present a list of Replies
    public function getReplies($topicNumber) {
        return View::make('/replies')
        	   ->with('topicNumber', $topicNumber);  
    }

    # Retrieve the view with the form to create a reply .
    public function getReplyForm($topicNumber) {
        return View::make('/createReply')
      	->with('topicNumber', $topicNumber);  
    }

    # Post a reply to a topic
    public function postReply() {
        $data = Input::all();
        
        # Step 1 Define the rules
        $rules = array('replyContent' => 'required');

        # Step 2 Apply the rules
        $validator = Validator::make(Input::all(), $rules);

        # Step 3 Communicate some errors.
        if($validator->fails()) {
            return Redirect::to('/replyForm/'.$data['topicNum'])
                ->with('flash_message', 'Error: No input provided.  Please enter your reply');
        }         
            
        $reply = new Reply;
        $reply['content'] = $data['replyContent'];
        $reply['topic_id'] = $data['topicNum'];
        $reply->author()->associate(Auth::user()); # <--- Associate the author with this Reply
        $reply->save();   
        return Redirect::to('/replies/'.$data['topicNum']);
    }

    # Admin function - retrieve the form for editing a reply.
    public function editForm($replyNumber) {
        return View::make('/editReply')
      	->with('replyNumber', $replyNumber);  
    }

    # Admin function - updating a reply
    public function update($replyNumber) {
    	$data = Input::all(); 	    
        $reply = DB::table('replies')->where('id', $replyNumber)->update(array('content' => $data['editedReply']));
        return Redirect::to('/replies/'.$data['topicNumber']);  
    }

    ########################################
    #
    #  These are the methods for Comments
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
            
        # Step 1 Define the rules
        $rules = array('commentContent' => 'required');

        # Step 2 Apply the rules
        $validator = Validator::make(Input::all(), $rules);

        # Step 3 Communicate some errors.
        if($validator->fails()) {
            return Redirect::to('/createComment/'.$data['replyNum'])
                ->with('flash_message', 'Error: No input provided.  Please enter your comment.');
        }            
        $comment = new Comment;
        $comment['content'] = $data['commentContent'];
        $comment['reply_id'] = $data['replyNum'];
        $comment->author()->associate(Auth::user()); # <--- Associate the author with this Comment
        $comment->save();   
        return Redirect::to('/replies/'.$data['topicNum']);        
    }

}