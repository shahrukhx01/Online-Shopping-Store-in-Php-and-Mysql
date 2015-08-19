    <div class="box-holder right" style="padding:10px; border-radius:10px; bottom: 120px; float: right; background: rgba(0,0,0,0.4);">

        <div class="label">
            <h3>Login</h3>
        </div>
        <div class="cl"></div>
        <form action="index.php" method="post">
            <br/><br/><input type="email" name="email" class="text_input" placeholder="Enter Your Email..." title="Your Email" />
            <br/><br/>
            <input type="password" class="text_input" name="password" placeholder="Enter Your Password..." title="Your Name" />
            <br/><br/>
            <input style="margin-left: 160px;" id="submit" type="submit" value="Login" />
            <?php  echo $msg_error; ?>
        </form>
        <div class="cl">&nbsp;</div>


    </div>

    <div class="cl"></div>
</div>