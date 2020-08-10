<?php
	$_SESSION['cps'] = '';
	if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
	    if (isset($_SESSION['login_user'])) {
	        $current_user =  trim($_SESSION['login_user']);
	        $conn = mysqli_connect('127.0.0.1', 'root', '', 'miniproject');

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "select * from users where uname = '".$current_user."'";
                if (($result = $conn->query($sql)) !== FALSE){
                    while($row = $result->fetch_assoc()){
                    	$email = $row['email'];
                    	$id = $row['id'];
                        $utype = $row['utype'];
                    }
                } 
            $conn->close();
	    } elseif (isset($_COOKIE['remember'])) {
	        $current_user =  trim($_COOKIE['remember']);
	    }
	    if ($current_user == '') {
			session_destroy();
			setcookie('remember', "");
	        header("location:login.php");
	        die();
	    }
	} else {
		session_destroy();
		setcookie('remember', "");
	    header("location:login.php");
	    die();
	}
?>