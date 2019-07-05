 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>

 <div class="container mainContainer">
      <div class="row">
    <div class="col-md-8">
    	<h2>Tweets for You</h2>

    	<?php displayTweets('isFollowing'); ?>
    </div>
    <div class="col-md-4">
    	<?php displaySearch(); ?>
 
    	<?php displayTweetBox(); ?>
    </div>
  </div>
</div>