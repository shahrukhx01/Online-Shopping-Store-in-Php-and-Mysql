<head><title>
        About Us
</title>
    <link rel="stylesheet" href="css/about_style.css"/>
</head>
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


<div id="content">
    <div class="products-holder" style="background: rgba(0,0,0,.4); border-radius: 10px;  width: 950px; margin: 0 auto;">

        <div class="middle"style="background: transparent">
            <div class="label">
                <h3>About Us</h3>
            </div>
            <div class="cl"></div>


        </div><table width="100%" cellpadding="5" cellspacing="5" border="0" style="color:white;">


            <tr>
                <td><p>We are an Pakistani online CD store  with variety of premium games and movies</p>
                <p>We provide genuine products to the customers at their doorstep on reasonable prices.</p>
                    <p>And allow them to make payments through gateways that are available in Pakistan</p>
                    <p>i.e EASY PAISA etc.</p>
                </td>
            </tr>
        </table>

    </div>

</div>
<div id="footer-push"></div>

<?php include_once('templates/footer.php');?>