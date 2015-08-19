<?php
include('../scripts/connect.php');
$sql="";
if(isset($_POST['status'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];
    if($status=='c')
        $val=1;
    else
        $val=0;
    mysql_query("update orders set status='$val' where id='$id'");

    echo "Status of this order successfully updated!";
}
?>
