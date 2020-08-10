<?php
    session_start();
    include 'session.php';
    if (isset($_POST['submit'])) {
        if (isset($_POST['pass'])) {
            $pass = trim($_POST['pass']);
            if ($pass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }
        if (isset($_POST['npass'])) {
            $npass = trim($_POST['npass']);
            if ($npass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'New Password is required';
        }
        if (isset($_POST['cpass'])) {
            $cpass = trim($_POST['cpass']);
            if ($cpass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }
        if($npass != $cpass){
            $passErr = "New password and Confirm password don't match";
        }
        if($npass == $pass){
                $passErr = "Current password and New password is same. Try new password!";
            }

        $conn = mysqli_connect('127.0.0.1', 'root', '', 'miniproject');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($passErr)) {} else {
            $sql = "select * from users where uname = '".$current_user."' AND pass = '".$pass."'";
            if (($result = $conn->query($sql)) !== FALSE){
                if($row = $result->fetch_assoc()){
                    $sql = "UPDATE users SET pass = '".$cpass."'
                    WHERE uname = '".$current_user."'";

                    if ($conn->query($sql) === TRUE) {
                        $passSuc = "Password changed successfully";
                        header('location:logout.php');
                    }
                }
            }
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>change password</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

        strong {
            color: red;
        }

        em {
            color: green;
        }
    </style>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right" style="padding-right: 10px">
                <p style="display: inline-block;">Logged in as <b><?php echo ucwords($current_user); ?></b></p>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="150px" style="padding: 0px 10px" align="top">
                <b>
                    <p style="border-bottom: 1px solid black; padding: 10px 0">Account [<?php echo $utype?>]</p>
                </b>
                <ul style="list-style-type: none;">
                    <li>
                        <?php if($utype == 'admin'){ ?>
                            <a href="dashboardAdmin.php" >Dashboard</a>
                        <?php ?>
                        <?php } else if($utype == "user"){ ?>
                            <a href="dashboard.php" >Dashboard</a>
                        <?php } ?> 
                    </li>
                    <li><a href="viewProfile.php">Veiw Profile</a></li>
                    <?php if($utype == 'admin'){ ?>
                        <li>
                            <a href="viewUsers.php">View Users</a>
                        </li>
                    <?php } ?>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td align="left" style="padding: 10px">
                <fieldset>
                    <legend>Change Password</legend>
                    <table>
                        <tr>
                            <td>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <table width="100%" cellpadding="1" cellspacing="0">
                                        <tr>
                                            <td>Current password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="pass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>New password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="npass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Retype password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="cpass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <hr />
                                    <?php if (isset($passErr)) { echo '<strong>' . $passErr . '</strong><br/><br/>'; } ?>
                                    <?php if (isset($passSuc)) { echo '<em>' . $passSuc . '</em><br/><br/>'; } ?>
                                    <input name="submit" type="submit" value="submit">
                                </form>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>