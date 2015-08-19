<?php include_once('header_top.php');?>
                <!-- Navigation -->
                <div id="navigation">
                    <ul>
                        <li><a title="Home" href="index.php">Home</a></li>
                        <li><a title="Catalog" href="catalog.php">Catalog</a></li>
                        <li><a title="Contact Us" href="contact.php">Contact Us</a></li>
                        <li><a title="About Us" href="#">About Us</a></li>
                        <li><a title="Log Out" href="logout.php">Logout</a></li>
                        <li><?php echo $_SESSION['name'];?></li>
                    </ul>
                </div>
                <div class="cl"></div>
                <!-- END Navigation -->
<?php include_once('header_bottom.php');?>