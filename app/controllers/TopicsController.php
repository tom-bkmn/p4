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

    # Delete a topic
    public function destroy($topicNumber) {
     echo "distroy a topic here " . $topicNumber;
    }



}
