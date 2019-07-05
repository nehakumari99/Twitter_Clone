<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
 
      include("function.php");

      if($_GET['action']== "loginSignup"){
      	 
      	 $error="";
      	 if(!$_POST['email']){
      	 	$error="An email address is required";
      	 }else if(!$_POST['password']){
            $error="A password is required";
      	 }
      	 else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false) {
  $error="please enter a valid email address";
}
        
      if($error!="") {
      	echo $error;
      	exit();
      }

      	if($_POST['lognActive']=="0")
      		$query="SELECT *FROM users WHERE email= '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";

      	$result=mysqli_query($link,$query);

      	if(mysqli_num_rows($result) == 0) $error= "That mail address is already taken";

      	else{
      		$query ="INSERT INTO users(`email` , `password`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";

      		if(mysqli_query($link,$query)){

      			 $_SESSION['id']=mysqli_insert_id($link);

      			$query="UPDATE users SET password='".md5(md5($_SESSION['id']).$_POST['password'])."'WHERE id=".$_SESSION['id']." LIMIT 1";
      			  mysqli_query($link, $query);

      			  echo 1;
                  
                 

      		}else{
      			$error="couldnt create user- please try again later"
      		}
      	}
      }
      else{
      	    $query="SELECT *FROM users WHERE email= '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";

      	$result=mysqli_query($link,$query);
      	$row=mysqli_fetch_assoc($result);
      		if($row['password']== md5(md5($row['id']).$_POST['password'])) {

      			echo 1;

      			$_SESSION['id']=$row['id'];

      		}else{

      			$error = "couldnt find the email address/password";
      		}
      	
      }
       if($error!="") {
      	echo $error;
      	exit();
      }
  }
  if($_GET['action']=='toggleFollow'){

  	$query="SELECT * FROM isFollowing WHERE follower = ".mysqli_real_escape_string($link,$_SESSION['id'])." AND isFollowing = ".mysqli_real_escape_string($link,$_POST['userId'])." LIMIT 1";

      	$result=mysqli_query($link,$query);

      	if(mysqli_num_rows($result) > 0) {

      		$row=mysqli_fetch_assoc($result);

      		mysqli_query($link,"DELETE FROM isFollowing WHERE id=".mysqli_real_escape_string($link,$row['id'])." LIMIT 1");

      		echo "1";
      	}
      	else{

      		mysqli_query($link,"INSERT INTO isFollowing (follower, isFollowing ) VALUES (".mysqli_real_escape_string($link,$_SESSION['id'])."," .mysqli_real_escape_string($link,$_POST['userId']).")" );
      		
      		echo "2";
      	}

  }

  if($_GET['action']=='postTweet'){
  	if(!$_POST['tweetContent']){

      	  	  		echo " Your Tweet is empty";

                    } else if (strlen($_
                    	POST['tweetContent'])>140){

                    	echo "Your Tweet is too long";
                    } else{

                    	mysqli_query($link,"INSERT INTO tweets (`tweets`, `userid`,`datetime`) VALUES ('".mysqli_real_escape_string($link,$_POST['tweetContent'])."'," .mysqli_real_escape_string($link,$_SESSION['Id']).",NOW())" );
                    	echo "1";
                    }

  }

?>
</body>
</html>