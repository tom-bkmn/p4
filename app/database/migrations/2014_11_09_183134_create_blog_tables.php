<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Users table tracks user name, email, password and admin status.  
		// Essential for login and access of the app.
		Schema::create('users', function($table) 
		{
		    $table->increments('id');
		    $table->string('email')->unique();
		    $table->string('remember_token',100); 
		    $table->string('password');
		    $table->string('user_name');
		    $table->boolean('is_admin');
		    $table->timestamps();
		
		});
		
		// Topics table implements one-to-many relationship with author
		Schema::create('topics', function($table)
		{
		    $table->increments('id');
		    $table->string('topic_name', 100);
		    $table->string('topic_content', 600);
		    $table->integer('author_id')->unsigned();
		    $table->foreign('author_id')->references('id')->on('users');
		    $table->timestamps();
		});

		// Replies table implements one-to-many relationship with author		
	        Schema::create('replies', function($table)
		{
		    $table->increments('id');
		    $table->string('content', 600);
		    $table->string('topic_id',10);
		    $table->integer('author_id')->unsigned();
		    $table->foreign('author_id')->references('id')->on('users');
		    $table->string('image_name', 20);
		    $table->timestamps();
		});	
		
		// Comments table implements one-to-many relationship with author		
	        Schema::create('comments', function($table)
		{
		    $table->increments('id');
		    $table->string('content', 200);
		    $table->string('reply_id', 10);
		    $table->integer('author_id')->unsigned();
		    $table->foreign('author_id')->references('id')->on('users');
		    $table->timestamps();
		});
		       
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics');
		Schema::drop('replies');
		Schema::drop('comments');
		Schema::drop('users');
	}

}
