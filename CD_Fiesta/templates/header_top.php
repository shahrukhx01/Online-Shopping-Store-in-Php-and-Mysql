<!DOCTYPE html>
<html lang="en-US">
<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="css/images/favicon.ico" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href="bootstrap.min.css" rel="stylesheet" />
    <script src=" js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src=" js/jssor.slider.mini.js"></script>

</head>
<body >




<!-- Wrapper -->



<div id="wrapper">
    <div id="wrapper-bottom">

        <!-- Header -->
        <div class="shell">
            <div id="header">

                <?php
                include('search.php');
                ?>

                <!-- Logo -->
                <?php if (isset($_SESSION['email']))
                {?>
                <p class="shopping-cart"><a class="cart" href="cart.php" title="Your Shopping Cart">Your Shopping Cart</a>
                <?php }
                else
                {
                ?>
                    <br/>
                 <?php }?>

                    <!-- Search Still to implemented along with logo....-->
                <div class="cl"></div>
                <div class="cl"></div>
                <?php if(isset($_SESSION['email']))
                {
                ?>
                <p style="color: #ffffff; font-size: 12px;">Welcome &nbsp; <?php echo $_SESSION['name'];?></p>

                <?php }?>