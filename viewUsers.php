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
                    <li><a href="viewUsers.php">View Users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td align="left" style="padding: 10px">
                <table border="1" cellpadding="5" cellspacing="0" style="width: 100%">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                    </tr>
                    <?php
                    $conn = mysqli_connect('127.0.0.1', 'root', '', 'miniproject');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "select * from users";
                        if (($result = $conn->query($sql)) !== FALSE)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $vid = $row['id'];
                                $vuname = $row['uname'];
                                $vemail = $row['email'];
                                $vuType = $row['utype'];
                                echo "<tr>
                                    <td>{$vid}</td>
                                    <td>{$vuname}</td>
                                    <td>{$vemail}</td>
                                    <td>{$vuType}</td>
                                </tr>";
                            }
                        }
                    $conn->close();
                    ?>
                </table>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>