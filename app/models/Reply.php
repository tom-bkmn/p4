<?php

class Reply extends Eloquent {

    public function author() {
        # Reply belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('User');
    }

    public function topics() {
        # Repliess belong to many Topics     
        return $this->belongsToMany('Topic');
    }

    public function comments() {
        # Replies belong to many Comments
       return $this->belongsToMany('Comment');
    }

    public function topicspt() {
        # Repliess belong to many Topics     
        return $this->belongsToMany('Topic', 'reply_topic', 'topic_id');
    }

}			