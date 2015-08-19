<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("location: ../admin.php");
    exit();
}

include_once('../scripts/connect.php');

$sql="SELECT orders.user_id,orders.status,orders.cnic_number,orders.email,orders.paid_amount,orders.phone_number,orders.products,orders.verify_code,orders.id FROM users JOIN orders ON users.id=orders.user_id";
$i=0;
$color=array("active", "success", "info", "warning", "danger");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css"/>
    <script type="text/javascript" src="../js/jquery-1.6.1.min.js"></script>
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
                <th>CNIC No.</th>
                <th>Email</th>
                <th>Verification Code</th>
                <th>Paid Amount</th>
                <th>Products</th>
                <th>Phone No.</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $order_id;
            if($query_run=mysql_query($sql))
            {
                while($row=mysql_fetch_assoc($query_run))
                {

                    $order_id=$row['id'];
                    $email=$row['email'];
                    $user_id=$row['user_id'];
                    $cnic_number=$row['cnic_number'];
                    $status=$row['status'];
                    $phone=$row['phone_number'];
                    $products=$row['products'];
                    $verify_code=$row['verify_code'];
                    $paid_amount=$row['paid_amount'];

                    $cart=explode(",",$products);
                    ?>


                    <tr class="<?php
                    $i++;
                    echo $color[$i%5]?>">

                        <td><?php echo $cnic_number;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $verify_code;?></td>
                        <td><?php echo $paid_amount;?></td>
                        <td>
                        <?php

                        $sortedCart = array_count_values($cart);

                        foreach ($sortedCart as $value => $count) {



                            $sql="SELECT * FROM `product` where id='$value' ";
                            if($query_run1=mysql_query($sql))
                            {
                                while($row=mysql_fetch_assoc($query_run1))
                                {
                                    $id=$row['id'];
                                    $product_name=$row['name'];
                                    $product_description=$row['description'];
                                    $product_price=$row['price'];
                                    $product_quantity=$row['quantity'];

                                }
                                ?>
                                <?php echo $product_name; echo" X $count" ;?> <br/>
                            <?php

                                }

                        }

                        ?>
                        </td>
                        <td ><?php echo $phone;?></td>
                        <td><select name="<?php echo $order_id; ?>" id="<?php echo $order_id; ?>" >
                               <?php if($status=='1') {?>
                                <option value="p" >Pending </option>
                                <option value="c" selected>Confirmed</option>
                            <?php                   }
                               else
                               {
                               ?>
                                   <option value="p" selected>Pending</option>
                                   <option value="c">Confirmed</option>

                               <?php }?>
                            </select></td>
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


<script type="text/javascript">
    $('select').change(function(e){
        var status=$(this).val();
        var id= e.target.id;
        //console.log(id);
        $.post('admin_confirm.php',{status:status,id:id},function(data){
            alert(data);
        });
    });
</script>

