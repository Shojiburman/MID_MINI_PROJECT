<?php
    session_start();
    include 'session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Veiw profile</title>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right" style="padding-right: 10px">
                <p style="display: inline-block;">Logged in as <b><?php echo ucwords($current_user); ?></b> | </p>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="250px" style="padding: 0px 10px" align="top">
                <strong>
                    <p style="border-bottom: 1px solid black; padding: 10px 0">Account [<?php echo $utype?>]</p>
                </strong>
                <ul style="list-style-type: none;">
                    <li>
                        <?php if($utype == 'admin'){ ?>
                            <a href="dashboardAdmin.php" >Dashboard</a>
                        <?php ?>
                        <?php } else if($utype == "user"){ ?>
                            <a href="dashboard.php" >Dashboard</a>
                        <?php } ?> 
                    </li>
                    <li><a href="changePassword.php">Change Password</a></li>
                    <?php if($utype == 'admin'){ ?>
                        <li>
                            <a href="viewUsers.php">View Users</a>
                        </li>
                    <?php } ?>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td align="left" style="padding: 10px">
                <table border="1" cellpadding="5" cellspacing="0" style="width: 100%">
                    <tr><td colspan="2" align="center" style="font-size: 1.5rem; font-weight: bold;">Profile</td></tr>
                    <tr>
                        <td><b>ID</b></td>
                        <td style="width: 500px">
                            <b><?php echo $id; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Name</b></td>
                        <td style="width: 500px">
                            <b><?php echo ucwords($current_user); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>
                            <b><?php echo $email; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><b>User Type</b></td>
                        <td>
                            <b><?php echo ucwords($utype); ?></b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>