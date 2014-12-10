  <div class="header" >
      <h4>  TBen's Forums, a place for discussion.  <h4>
      <h4>
          <?php $userName = Auth::user()->user_name; ?>
          Logged in as: <?php echo $userName ?> <br>
          <a href="/createTopic">Create a Topic</a>
          <a href="/logout">logout</a> 
      </h4>
  </div>