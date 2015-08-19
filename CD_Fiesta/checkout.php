<head><title>
        Checkout
    </title>
    <link rel="stylesheet" href="css/checkout_style.css"/>
</head>


<?php

session_start();


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
$sql="SELECT * FROM cart where mem_id='$user_id' limit 1 ";
$cart=array();
$carts="";
$total=0;
if($query_run=mysql_query($sql))
{
    $row = mysql_fetch_assoc($query_run);
    $con=mysql_num_rows($query_run);
    if($con==1)
    {
        $id = $row['id'];
        $mem_id = $row['mem_id'];
        $carts = $row['cart'];
        $total = $row['total'];
        $carts=$carts."";
        $_SESSION['total']=$total;

        $cart=explode(",",$carts);
        $_SESSION['quantity']=count($cart);
    }

    else
    {
        //$carts="You have a empty cart right now!";
    }



}


?>






<div id="content">
    <div class="products-holder" style="background: rgba(0,0,0,.4); border-radius: 10px; width: 700px; margin: 0 auto;">

        <div class="middle"style="background: transparent">
            <div class="label">
                <h3>Check Out</h3>
            </div>
            <div class="cl"></div>
            <form action="order_status.php" method="post" >


                <div class="cl"></div>
        </div><table cellpadding="5" cellspacing="5" border="0">
            <tr>
                <td align="center" colspan="2"><label><h3>Send your payments at +923451234567 via EASY PAISA and enter verification code below.</h3></label></td>

            </tr>


            <tr>
                <td align="right"><label>Email:</label></td>
                <td align="left"><input required  type="email" name="mail" placeholder="Enter Your Email Address..." class="text_input" maxlength="80"/></td>
            </tr>
            <tr>
                <td align="right"><label>Phone Number:</label></td>
                <td align="left"><input required type="text" name="phone" maxlength="15" placeholder="Enter Phone number eg: 923451234567..." class="text_input" /></td>
            </tr>

            <tr>
                <td align="right"><label>CNIC Number:</label></td>
                <td align="left"><input required type="text" name="cnic" maxlength="15" placeholder="Enter Your CNIC Number with dashes..." class="text_input" /></td>
            </tr>

            <tr>
                <td align="right"><label>Easy Paisa Code:</label></td>
                <td align="left"><input required type="text" name="code" maxlength="15" placeholder="Enter EASY PAISA verification code..." class="text_input" /></td>

            </tr>
            <tr>
                <td align="left"><input type="hidden" name="cart"  value="<?php echo $carts;?>" /></td>
                <td align="left"><input type="hidden" name="total"  value="<?php echo $total;?>" /></td>
            </tr>

            <tr >
                <td  colspan="2" align="center"><input id="submit" type="submit" value="Done"/></td>

            </tr>
        </table>
        </form>
    </div>

</div>


    <div id="footer-push"></div>

<?php include_once('templates/footer.php');?>


<!-- form styling-->

<style type="text/css">
    #submit
    {
        background: #026a84;
        padding: 10px;
        border-radius: 5px;


        color: white;
        border: 0px;
        margin-left:300px;
        background: -webkit-linear-gradient(top,#00aac9, #026a84);
    }

    #submit:hover
    {
        color: #ffffff;
        background: #026a84;
        text-shadow: 1px 1px #ffffff;
    }

    table
    {
        margin: 0 auto;
    }
    label
    {
        font-family:  arial, sans-serif;
        font-size: 16px;
        color: #ffffff;
    }
    .text_input
    {
        border-radius: 7px;
        box-shadow: #000000 2px 2px 8px;
        width: 300px;
        padding: 5px;
    }
    h2
    {
        font-size: 22px;
    }
    td
    {
        padding: 10px;
    }
</style>