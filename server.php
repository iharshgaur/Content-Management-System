<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$usn 	  = "";
	$phone	  = "";
	$sem 	  = "";
	$sec 	  = "";
	$branch   = "";
	$pos 	  = "";

	$errors = array();
	$errorl = array(); 

	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'harsh', 'harsh123', 'aca_cms') or DIE("unable to connect database");
	
	// STUDENT REGISTRATION
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$usn = mysqli_real_escape_string($db,$_POST['usn']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$sem = $_POST['sem'];
		$sec = $_POST['sec'];
		$dept = $_POST['dept'];
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		
		if (empty($username)) { array_push($errors, "Username"); }
		if (empty($email)) { array_push($errors, "Email"); }
		if (empty($usn)) { array_push($errors, "USN"); }
		if (empty($phone)) { array_push($errors, "Phone"); }
		if (empty($sem)) { array_push($errors, "Sem"); }
		if (empty($sec)) { array_push($errors, "Sec"); }
		if (empty($dept)) { array_push($errors, "dept "); } 
		if (empty($password_1)) { array_push($errors, "Password"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}


		  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errorl, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errorl, "email already exists");
    }
  }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, usn, phone, sem,sec, dept) 
					  VALUES('$username', '$email', '$password','$usn', '$phone','$sem','$sec','$dept')";
				mysqli_query($db, $query);
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}

	}

	// ..TEACHERS REGISTRATION. 
	// 
	// 
	if (isset($_POST['reg_teacher'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$usn = mysqli_real_escape_string($db,$_POST['usn']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$dept = $_POST['dept'];


		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username"); }
		if (empty($email)) { array_push($errors, "Email"); }
		if (empty($phone)) { array_push($errors, "Phone"); }
		if (empty($dept)) { array_push($errors, "Department"); }
	

		if (empty($password_1)) { array_push($errors, "Password"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}



			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";


		  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM teachers WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO teachers (username, email, password, phone, dept) 
					  VALUES('$username', '$email', '$password', '$phone','$dept')";
				mysqli_query($db, $query);
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}

	}

	// 
	// 

	// FOR USER LOGIN
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$pos = $_POST['pos'];


		if (empty($username)) {
			array_push($errorl, "Username required");
		}
		if (empty($password)) {
			array_push($errorl, "Password required");
		}
		if (empty($pos)) { array_push($errorl, "Position required"); }


		if (count($errors) == 0) {
			if($pos=="S"){
			$password = md5($password);
			$query1 = "SELECT * FROM users WHERE username='$username' AND password='$password'";

			$results1 = mysqli_query($db, $query1);

			if (mysqli_num_rows($results1) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
			}
				else{
				array_push($errors, "Wrong username/password combination");
			
			}	}
			else {

			$password = md5($password);
			$query2 = "SELECT * FROM teachers WHERE username='$username' AND password='$password'";

			$results2 = mysqli_query($db, $query2);
			
			if (mysqli_num_rows($results2) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: homeT.php');
			}
				else{
				array_push($errors, "Wrong username/password combination");
			}
			}
			}
	}
?>