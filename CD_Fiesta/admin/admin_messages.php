<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("location: ../admin.php");
    exit();
}

include_once('../scripts/connect.php');

$sql="SELECT * FROM `messages`";
$i=0;
$color=array("active", "success", "info", "warning", "danger");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Messages</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="style/style.css"/>

</head>
<body>



<div id="main_wrapper">

    <div id="header">
    <?php include_once('../templates/admin_header.php');?>
        <a id="logout"href="admin_logout.php"> <div class="btn btn-default logout">Logout</div></a>
    <?php include_once('../templates/admin_nav.php');?>
    </div>





        <div class="messages">
            <table class="table" width="1000px" style="border-radius:10px; background: rgba(0,0,0,0.4)">
                <thead>
                <tr style="color: #ffffff">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date Sent</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($query_run=mysql_query($sql))
                {
                while($row=mysql_fetch_assoc($query_run))
                {

                $id=$row['id'];
                $msg_name=$row['msg_name'];
                $msg_email=$row['msg_email'];
                $msg_subject=$row['msg_subject'];
                $msg=$row['msg'];
                $date=$row['msg_date'];
                ?>

                <tr class="<?php
                $i++;
                echo $color[$i%5]?>">

                    <td><?php echo $msg_name;?></td>
                    <td><?php echo $msg_email;?></td>
                    <td><?php echo $msg_subject;?></td>
                    <td><?php echo $msg;?></td>
                    <td><?php echo $date;?></td>
                </tr>
                    <?php
                }
                }?>
        </tbody>
            </table>
        </div>

    <?php include_once('../templates/admin_footer.php');?>


</div>


</body>
</html>
<style type="text/css">
    .messages{
        margin: 20px;
    }
    #main_menu
    {
        width: 980px;

    }
</style>
