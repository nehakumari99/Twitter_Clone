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

        <?php if (isset($_GET['userid'])) {?>
        
         <?php displayTweets($_GET['userid']); ?>

        <?php }

        else { ?> 

    	<h2> Active Users</h2>

    	<?php displayUsers(); ?>

        <?php } ?>

    </div>
    <div class="col-sm-4">
    	<?php displaySearch(); ?>
 
    	<?php displayTweetBox(); ?>
    </div>
  </div>
</div>