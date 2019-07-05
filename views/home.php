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
    <div class="col-sm-8">
    	<h2> Recent tweets</h2>

    	<?php displayTweets('public'); ?>
    </div>
    <div class="col-sm-4">
    	<?php displaySearch(); ?>
 
    	<?php displayTweetBox(); ?>
    </div>
  </div>
</div>