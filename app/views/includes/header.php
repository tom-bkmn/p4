      <h4 class="navigation">
          <?php $userName = Auth::user()->user_name; ?>
          Logged in as: <?php echo $userName ?> <br>
          <a href="/createTopic">Create a Topic</a>
          <a href="/logout">logout</a> 
      </h4>
      <p>TBen's Blog: A place to discuss music production and modular synthesizers </p>