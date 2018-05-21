<?php 
     session_start();

     //setting a cookie
     $sessionID = session_id(); //storing session id
 
     setcookie("user_login",$sessionID,time()+3600,"/","localhost",false,true); //cookie-sessionid terminates after 1 hour - HTTP only flag
     
    $_SESSION['key']=bin2hex(random_bytes(32)); 
    $token = hash_hmac('sha256',"token for user login",$_SESSION['key']);  
    $_SESSION['CSRF_TOKEN'] = $token;

    setcookie("cToken",$token,time()+3600,"/","localhost",false,true); //cookie-token terminates after 1 hour

?>


<!DOCTYPE html>
<html>

<head>
    <title>Secure Software Systems</title>		
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="conf.js"> </script>
</head>



<body>
		
	
<div class="login">


<h1 style="font-size: 35px;text-align:center;color: #dff9fb;">Secure Software Systems</h1>
        <p style="text-align:center;color: #95afc0">Cross-Site Request Forgery Protection--- Double_Submit_Cookies</p>
    <hr>

	<h1>Login</h1>
    <form method="POST" action="server.php">
    	<input type="text" name="user" placeholder="Username" required="required" />
		<input type="password" name="pass" placeholder="Password" required="required" />
		<input type="hidden" name="user_csrf" id="IdOfToken" value="<?php echo $token ?>" /> 
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login.</button>
    </form>

    <p style="text-align:Left;color: #95afc0"><b>Contact me:</b></p> 
	<p style="text-align:Left;color: #95afc0">Blogspot:<a href="https://mranonymousworld.blogspot.com/">  Mr. Anonymous</a> <br>
	 GitHub:<a href="https://github.com/samabisherk">  R. Sam Abisherk</a></p>
</div>

</body>
</html>