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


    # Retrieve the form to delete a topic
    public function deleteTopic($topicNumber) {
        return View::make('/deleteTopic')
       	   ->with('topicNumber', $topicNumber);
    }

    # Admin function: Delete a topic and all its associated replies and comments
    public function destroy($topicNumber) {
    	$topic = DB::table('topics')->where('id', $topicNumber) ->first();
    	$topicName = $topic->topic_name;
        $replies = DB::table('replies')->where('topic_id', $topicNumber)->get(); 

    	// Loop through replies and delete the comments then the reply
    	foreach ($replies as $reply) {
            $comments = DB::table('comments')->where('reply_id', $reply->id)->get();
            foreach ($comments as $comment) {
                DB::table('comments')->where('id', '=', $comment->id)->delete();
            }    		
    	    DB::table('replies')->where('id', '=', $reply->id)->delete();	
    	}
    	
    	// Now delete the topic
        DB::table('topics')->where('id', '=', $topicNumber)->delete();
        
        // Redirect to /topics include flash message with the deleted topic name.
        return Redirect::to('/topics')->with('flash_message', 'Topic: "' . $topicName . '" was deleted.');
    }



}
