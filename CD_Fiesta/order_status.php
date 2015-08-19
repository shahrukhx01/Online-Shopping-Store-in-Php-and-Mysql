<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("location: index.php");
    exit();
}
?>


<?php    include_once('templates/header_top.php');?>

    <!-- Navigation -->
<?php
include('templates/navigation.php');

?>
    <!-- END Navigation -->

<?php
$status_order="";
$user_id=$_SESSION['id'];
if(isset($_POST['mail']))
{

    $email=$_POST['mail'];
    $phone=$_POST['phone'];
    $carts=$_POST['cart'];
    $total=$_POST['total'];
    $cnic=$_POST['cnic'];
    $verify_code=$_POST['code'];

    if((!$carts)  ){
        $status_order="Sorry! You have an empty cart. Please add some item(s) to your cart!";
    }
    else
    {
        include_once("scripts/connect.php");
        $sql = mysql_query("INSERT INTO orders(email, phone_number, CNIC_number,verify_code, products,user_id,paid_amount) VALUES('$email','$phone','$cnic','$verify_code','$carts','$user_id','$total')");
        $sql = mysql_query("delete from cart where mem_id='$user_id'");
        $status_order="Order Successfully placed! Thank you For having interest in our site. You 'll soon receive a response from us of confirmation of your order. If you don't receive the email, you can send us an email at admin@cd-fiesta.com";
    }

}
?>








    <!-- Including Slider... -->


        <?php
        include('templates/slider.php');

        ?>


    <!--slider end -->



    <div id="content">
        <div class="products-holder" style="background: rgba(0,0,0,.4); border-radius: 10px; width: 990px; margin: 0 auto;">

            <div class="middle"style="background: transparent">
                <div class="label">
                    <h3>Order Status</h3>
                </div>
                <div class="cl"></div>


                <p style="margin-top: 15px; color: #ffffff;font-size: 16px; font-style: italic;">
                <?php echo $status_order;?>
                </p>
            </div>

        </div>
    </div>
    <div id="footer-push"></div>
<?php include_once('templates/footer.php');?>