<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>LOGIN | VANARTS STUDENT MOCK PROJECT SITE</title>
    <meta name="description" content="This is a student exercise website for the Vancouver Institute of Media Arts (www.vanarts.com)." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" type="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="StyleSheet" type="text/css" href="css/cms-main.css" />
</head>
<body>
    <!-- Open Container -->
    <main class="login-container">
        <a href="../index.php"><img class="main-logo" src="img/logo.png" alt="logo"/></a>
    	<div class="log">
    		<?php
    			 if(isset($_GET["error"])){
    			 	echo "<h5>Error: Please Enter Username and Password</h5>";
    			 }
    		?>
            <!-- Open Form -->
    		<form method="POST" action="actions/process-login.php">
                <!-- User -->
                <div class="form-group">
            			<label>Username:</label><br>
            			<input type="text" name="strUser" class="form-control">
                </div>
                <!-- Password -->
                <div class="form-group">
        			     <label>Password:</label>
            			 <input type="password" name="strPassword" class="form-control">
                </div>
                <input type="submit" name="submit" value="Log In" class="log-btn">
    		</form>
            <!-- Close Form -->
    	</div>
    </main>
    <!-- Close Container -->
</body>
</html>
