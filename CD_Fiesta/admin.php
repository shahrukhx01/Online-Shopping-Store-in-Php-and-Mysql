<head>
    <meta charset="UTF-8">
    <title>Admin login</title>
    <link rel="stylesheet" href="css/admin_style.css"/>
</head>

<?php

$msg=" ";

session_start();
if(isset($_SESSION['name']))
{
    header("location: admin/index.php");
    exit();
}

if(isset($_POST['username'])   )
{
    $admin=$_POST['username'];
    $password=$_POST['password'];
    $admin=stripslashes($admin);
    $password=stripslashes($password);
    $admin=strip_tags($admin);
    $password=strip_tags($password);
    if((!$admin) || (!$password))
    {
        $msg="<p style='color: white'>"."Wrong Password Or Username!</p>";
    }
    else
    {
        $admin=mysql_real_escape_string($admin);
        $password=md5($password);
        include_once('scripts/connect.php');
        $sql="SELECT `id`, `name`, `password`, `last_log` FROM `admins`where name='$admin' and password='$password'";

        if($query_run=mysql_query($sql))
        {
            while($row=mysql_fetch_assoc($query_run))
            {
                $s_id=$row['id'];
                $s_name=$row['name'];
                $s_pass=$row['password'];
                echo '$name';
                $_SESSION['id']=$s_id;
                $_SESSION['name']=$s_name;
                $_SESSION['password']=$s_pass;
                mysql_query("UPDATE `cd`.`admins` SET `last_log` = NOW() WHERE `admins`.`id` = '$s_id'");
                header("location: admin/index.php");
            }
        }

        else if($_POST['username'])
        {
            $msg="<p style='color: white'>"."Wrong Password Or Username!</p>";

        }


    }



}

?>


<!doctype html>
<html lang="en">
<body>

        <div id="main_wrapper">
            <form action="admin.php" method="post" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="5" border="0">

                    <tr>
                        <td align="center" colspan="2">
                            <h2 >Admin Login</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><label>Username:</label></td>
                        <td align="left"><input autofocus type="text" name="username" placeholder="Enter Your name..." class="text_input" maxlength="20"/></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Password:</label></td>
                        <td align="left"><input  type="password" name="password" placeholder="Enter Pasword..." class="text_input"/></td>

                    </tr>
                    <tr >
                        <td  colspan="2" align="center"><input id="submit" type="submit" value="Login"/></td>

                    </tr>
                    <tr>
                        <td colspan="2" align="center"><?php echo "<p style='color: white'>". $msg."</p>";?></td>
                    </tr>
                </table>
            </form>
        </div>
</body>
</html>