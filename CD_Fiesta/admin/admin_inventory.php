<?php
session_start();
if(!isset($_SESSION['name']))
{
    header("location: ../admin.php");
    exit();
}
include_once('../scripts/connect.php');

$sql="SELECT * FROM `product`";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Inventory</title>
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="style/style.css"/>
</head>
<body>



<div id="main_wrapper">
    <div id="header">
    <?php include_once('../templates/admin_header.php');?>
        <a id="logout"href="admin_logout.php"> <div class="btn btn-default logout">Logout</div></a>
    <?php include_once('../templates/admin_nav.php');?>
    </div>


<div id="main">
    <!-- Slider -->

</div>
<!-- END Slider -->
<!-- Content -->
<div id="content">
<!-- Featured Products -->
<div class="products-holder">

    <div class="middle">
        <div class="label">
            <h3>Admin Inventory</h3>
        </div>
        <div class="cl"></div>
 <?php       if($query_run=mysql_query($sql))
        {
        while($row=mysql_fetch_assoc($query_run))
        {
         $id=$row['id'];
        $product_name=$row['name'];
        $product_description=$row['description'];
        $product_price=$row['price'];
        $product_quantity=$row['quantity'];
        $status=$row['status'];
?>
            <div class="product">
                <a  title="Details" href="#"><img id="img" src="../products/<?php echo $id?>.jpg" alt="paperclip" /></a>
                <div class="desc">
                    <p class="name"><?php echo  $product_name;?></p>
                    <p>Status: <span>
                       <?php if($status==0)
                            {
                            echo "UnAvailable";}
                            else
                            {
                            echo "Available";
                            }?>
                    </span></p>
                    <p>Quantity: <span><?php echo $product_quantity?></span></p>
                    <p>Product code: <span><?php echo $id?></span></p>
                </div>
                <div class="price-box">
                    <p>$<span class="price">  <?php echo $product_price;?><sup>.00</sup></span></p>
                    <p class="per-peace">Per Peace</p>
                </div>
                <div class="cl"></div>
            </div>


  <?php      }
        }
?>
            <div class="cl"></div>
        </div>
        <div class="cl"></div>
    </div>
</div>
<!-- END Featured Products -->

</div>
<!-- END Content -->



    <?php include_once('../templates/admin_footer.php');?>


</div>


</body>
