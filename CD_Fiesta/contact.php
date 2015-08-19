<head><title>
        Contact Us
    </title>

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


<?php
$msg_error=" ";
if(isset($_POST['msg_name']))
{
    $msg_name=$_POST['msg_name'];
    $msg_email=$_POST['msg_email'];
    $msg_subject=$_POST['msg_subject'];
    $msg=$_POST['msg'];
    $msg_name = trim($msg_name);
    $msg_email = trim($msg_email);
    $msg_subject = trim($msg_subject);
    $msg = trim($msg);

    $msg_name = strip_tags($msg_name);
    $msg_email = strip_tags($msg_email);
    $msg_subject = strip_tags($msg_subject);
    $msg = strip_tags($msg);
    $msg_name = stripslashes($msg_name);
    $msg_email = stripslashes($msg_email);
    $msg_subject = stripslashes($msg_subject);
    $msg = stripslashes($msg);
    $msg_email=mysql_real_escape_string($msg_email);
    if((!$msg_name) || (!$msg_email) || (!$msg_subject) || (!$msg) ){
        $msg_error = "Please fill all the input data!";
    }
    else
    {
        include_once("scripts/connect.php");
        $sql = mysql_query("INSERT INTO messages(msg_name, msg_email, msg_subject,msg, msg_date) VALUES('$msg_name','$msg_email','$msg_subject','$msg', now())");
        $msg_error = "Message Successfully sent! Thankyou For having interest in our site.<br> You 'll soon receive a response from us";

    }

}
?>
    <div id="content">
        <div class="products-holder" style="background: rgba(0,0,0,.4); border-radius: 10px; width: 700px; margin: 0 auto;">

            <div class="middle"style="background: transparent">
                <div class="label">
                    <h3>Contact US</h3>
                </div>
                <div class="cl"></div>
                <form action="contact.php" method="post" >


                <div class="cl"></div>
            </div><table cellpadding="5" cellspacing="5" border="0">

                <tr>
                    <td align="right"><label>Full Name:</label></td>
                    <td align="left"><input required autofocus type="text" name="msg_name" placeholder="Enter Full Name..." class="text_input" maxlength="100"/></td>
                </tr>
                <tr>
                    <td align="right"><label>Email:</label></td>
                    <td align="left"><input required  autofocus type="email" name="msg_email" placeholder="Enter Your Email Address..." class="text_input" maxlength="80"/></td>
                </tr>
                <tr>
                    <td align="right"><label>Subject:</label></td>
                    <td align="left"><input required type="text" name="msg_subject" maxlength="50" placeholder="Enter Subject Of Message..." class="text_input" /></td>
                </tr>

                <tr>
                    <td align="right"><label>Message:</label></td>
                    <td align="left"><Textarea required  style="height: 80px; width: 300px;padding: 5px;resize: none;" name="msg" placeholder="Enter  Your Message..." class="text_input" ></textarea></td>
                </tr>
                <tr >
                    <td  colspan="2" align="center"><input id="submit" type="submit" value="Done"/></td>

                </tr>
                <tr>
                    <td colspan="2" align="center"><?php echo "<p style='color: white; font-size: 17px;' >". $msg_error."</p>";?></td>
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
