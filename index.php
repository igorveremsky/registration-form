<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration Form</title>
	<style>
		* {box-sizing: border-box}

		/* Full-width input fields */
		input[type=text], input[type=password] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			display: inline-block;
			border: none;
			background: #f1f1f1;
		}

		input[type=text]:focus, input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		hr {
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
		}

		/* Set a style for all buttons */
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
			opacity: 0.9;
		}

		button:hover {
			opacity:1;
		}

		/* Float cancel and signup buttons and add an equal width */
		button {
			float: left;
			width: 100%;
		}

		/* Add padding to container elements */
		.container {
			padding: 16px;
		}

		/* Clear floats */
		.clearfix::after {
			content: "";
			clear: both;
			display: table;
		}
	</style>
</head>
<body>
<form action="action.php" style="border:1px solid #ccc">
	<div class="container">
		<h1>Log In</h1>
		<p>Please fill in this form to login.</p>
		<hr>

		<label for="email"><b>Login</b></label>
		<input type="text" placeholder="Enter Login" name="login" required>

		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" required>

		<div class="clearfix">
			<button type="submit" class="loginbtn">Log In</button>
		</div>
		<div class="container signin">
			<p>Already no account? <a href="signup.php">Sign up</a>.</p>
		</div>
	</div>
</form>
</body>
</html>