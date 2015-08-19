<head><title>
        Shopping History
    </title>
    <link rel="stylesheet" href="css/cart_style.css"/>
</head>


<?php

session_start();
$i=0;
$color=array("success", "error", "info", "warning");

if(!isset($_SESSION['id']))
{
    header("location: index.php");
    exit();
}
?>

<?php
include('templates/header_top.php');
?>

<!-- Navigation -->
<?php
include('templates/navigation.php');

?>
<!-- END Navigation -->


<!-- Including Slider... -->

    <?php
    include('templates/slider.php');

    ?>


<!--slider end -->


<?php



include('scripts/connect.php');
$user_id=$_SESSION['id'];
$sql="SELECT orders.user_id,orders.status,orders.cnic_number,orders.email,orders.paid_amount,orders.phone_number,orders.products,orders.verify_code,orders.id FROM users JOIN orders ON users.id=orders.user_id where users.id='$user_id'";
$cart=array();

$total=0;


?>



<div id="cart" >


    <div class="label" style="margin-left:0px;margin-top: 510px;">
        <h3>Shopping History</h3>
    </div>
    <div class="cl"></div>
    <div id="cart_content">
        <table class="table" width="100%" cellspacing="0" style="color: #ffffff; margin-top:60px;border-radius:10px; background: rgba(0,0,0,0.4)">
            <?php
            if($query_run=mysql_query($sql))
            {
            $i=0;
            $con=mysql_num_rows($query_run);
            while($row=mysql_fetch_assoc($query_run))
            {
            $i++;
            $id=$row['id'];
            $email=$row['email'];
            $user_id=$row['user_id'];
            $cnic_number=$row['cnic_number'];
            $phone=$row['phone_number'];
            $products=$row['products'];
            $verify_code=$row['verify_code'];
            $paid_amount=$row['paid_amount'];
            $order_status=$row['status'];
            $cart=explode(",",$products);

            ?>

            <thead>


            <tr><td colspan="3" style="color: #67b168;" align="left"><br/><h3>Order <?php echo $i;?> </h3></td></tr>

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

                    <tr >

                        <td align="center"><?php echo $cnic_number;?></td>
                        <td align="center"><?php echo $email;?></td>
                        <td align="center"><?php echo $verify_code;?></td>
                        <td align="center"><?php echo $paid_amount;?></td>
                        <td align="center">
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
                                        $status=$row['status'];
                                    }
                                    ?>
                                    <?php echo $product_name; echo" X $count" ;?> <br/>
                                <?php

                                }

                            }

                            ?>
                        </td>
                        <td align="center"><?php echo $phone;?></td>
                        <td align="center"><?php $label=$order_status=='1'?'Confirmed':'Pending' ;echo $label; ?></td>
                    </tr>

                <?php

                }
                if($con==0)
                {
                    ?>

                    <tr>
                        <td align="center"><br/><br/><h3>You have ordered nothing yet! </h3></td>
                    </tr>
                <?php
                }


                }


                ?>
                    <tr>
                        <td><br/></td>
                    </tr>
            </tbody>
        </table>
    </div>




    <div class="cl"></div>

</div>


<div id="footer-push"></div>

<?php include_once('templates/footer.php');?>