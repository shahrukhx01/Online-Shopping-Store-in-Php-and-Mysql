<?php
include('templates/header_top.php');
session_start();
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
include_once('scripts/connect.php');

$sql="SELECT * FROM `product` ";


?>
    <head><title>
            Catalog
        </title></head>

    <!-- Content -->
    <div id="content">
        <!-- All Products -->
        <div class="products-holder">

            <div class="middle">
                <div class="label">
                    <h3>Products Catalog</h3>
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
                            <a  title="Details" href="product.php?id=<?php echo $id;?>"><img height="152" width="185" id="img" src="products/<?php echo $id?>.jpg" alt="<?php echo  $product_name;?>" /></a>
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
                                <p>Rs.<span class="price">  <?php echo $product_price;?></span></p>
                                <p class="per-peace">Per Peace</p>
                            </div>
                            <div class="cl"></div>
                        </div>


                    <?php      }
                }
                ?>


                <div class="cl"></div>
            </div>
        </div>
    </div>

    <div id="footer-push"></div>

<?php include_once('templates/footer.php');?>