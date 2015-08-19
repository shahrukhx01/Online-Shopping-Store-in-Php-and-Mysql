<head><title>
        CD Fiesta
    </title>
    <script type="text/javascript" src="js/jquery-1.8.0.min.js" ></script>
    <script type="text/javascript" src="js/search.js" ></script>

</head>

<?php
session_start();
//testing login....
$email = "";
$password = "";
$msg_error = "";
$s_id="";
$msg = "";
$count=0;

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if((!$email) || (!$password)){
        $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password!</p>";
    }
    else
    {
        //$email = mysql_real_escape_string($email);
        $password = md5($password);
        include('scripts/connect.php');
        $sql="SELECT * FROM `users`where email='$email' and password='$password'";


        if($query_run=mysql_query($sql))
        {
            while($row=mysql_fetch_assoc($query_run))
            {
                $s_id=$row['id'];
                $s_name=$row['full_name'];
                $s_email=$row['email'];
                $s_pass=$row['password'];

                $_SESSION['id']=$s_id;
                $_SESSION['email']=$s_email;
                $_SESSION['password']=$s_pass;
                $_SESSION['name']=$s_name;


            }
        }

        else{
            $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password sql!</p>";
        }
    }
}

?>
<!-- Including top header !-->
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
$sql="SELECT * FROM `product` where category='game' order by sales DESC LIMIT 8 ";
$sql1="SELECT * FROM `product`  where category='movie' order by sales DESC LIMIT 8  ";

?>



					<!-- Content -->
					<div id="content">
						<!-- Featured Games -->
						<div class="products-holder">
							
							<div class="middle">													
								<div class="label">
									<h3>Top Games</h3>
								</div>
								<div class="cl"></div>
                                <?php
                                if($query_run=mysql_query($sql))
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
						<!-- END Games Games -->
						<!-- Movies -->
                        <div class="products-holder">

                            <div class="middle">
                                <div class="label">
                                    <h3>Top Movies</h3>
                                </div>
                                <div class="cl"></div>
                                <?php       if($query_run=mysql_query($sql1))
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
                        <!-- END Movies -->
						<!-- Bottom Strip -->
                        <div class="bottom-strip">
                            <?php include_once("templates/bottom.php");?>

                                    <?php
                                    if(!isset($_SESSION['email']))
                                        include('templates/login.php');


                                    ?>
                        </div>
                        <!-- END Bottom Strip -->
					</div>
					<!-- END Content -->



<?php include_once('templates/footer.php');?>


