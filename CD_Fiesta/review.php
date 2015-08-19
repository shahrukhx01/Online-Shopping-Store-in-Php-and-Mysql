<?php
session_start();
$msg_review="";
$review="";
$user_name="";

if(isset($_POST['review'] ) && !empty($_POST['review'] ) )
{
    include_once('scripts/connect.php');
    $user_name=$_SESSION['name'];
    $review=$_POST['review'];
    $id=$_POST['p_id'];
    $sql="INSERT into reviews(user_name,product_id,review,review_date) VALUES ('$user_name','$id','$review',now())";
    mysql_query($sql);
    $msg_review="Review successfully added!";
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $msg_review="Please enter a review!";
}

?>
<?php    include_once('templates/header_top.php');?>

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



    <div id="content">
        <div class="products-holder" style="background: rgba(0,0,0,.4); border-radius: 10px; width: 990px; margin: 0 auto;">

            <div class="middle"style="background: transparent">
                <div class="label">
                    <h3>Review Status</h3>
                </div>
                <div class="cl"></div>


                <p style="margin-top: 15px; color: #ffffff;font-size: 16px; font-style: italic;">
                    <?php echo $msg_review;?>
                </p>
            </div>

        </div>
    </div>
    <div id="footer-push"></div>
<?php include_once('templates/footer.php');?>