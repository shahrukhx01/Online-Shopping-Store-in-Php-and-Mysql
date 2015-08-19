<div id="navigation">

    <ul>
        <li><a title="Home" href="index.php">Home</a></li>
        <li><a title="Catalog" href="catalog.php">Catalog</a></li>
        <li><a title="Games" href="games.php">Games</a></li>
        <li><a title="Movies" href="movies.php">Movies</a></li>
        <li><a title="Contact Us" href="contact.php">Contact Us</a></li>
        <li><a title="About Us" href="aboutus.php">About Us</a></li>
        <?php if(!isset($_SESSION['id']))
        {
            ?>

            <li><a title="Sign Up" href="signup.php">Sign Up</a></li>
        <?php
        }
        else {
            ?>
            <li><a title="Log out" href="logout.php">Log Out</a></li>


        <?php
        }
        ?>
    </ul>
</div>
<div class="cl"></div>