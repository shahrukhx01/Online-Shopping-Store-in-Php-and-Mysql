<?php
$msg=" ";
session_start();
if(!isset($_SESSION['name']))
{
    header("location: ../admin.php");
    exit();
}

if(isset($_POST['product_name']))
{
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_price=$_POST['product_price'];
    $product_quantity=$_POST['product_quantity'];
    $category=$_POST['category'];
    $id=$_POST['id'];
    $status=$_POST['status'];

    $product_name = trim($product_name);
    $product_description = trim($product_description);
    $product_price = trim($product_price);
    $product_quantity = trim($product_quantity);
    $category = trim($category);
    $id = trim($id);
    $product_name = strip_tags($product_name);
    $product_description = strip_tags($product_description);
    $product_price = strip_tags($product_price);
    $product_quantity = strip_tags($product_quantity);
    $category = strip_tags($category);
    $id = strip_tags($id);
    $product_name = stripslashes($product_name);
    $product_description = stripslashes($product_description);
    $product_price = stripslashes($product_price);
    $product_quantity = stripslashes($product_quantity);
    $category = stripslashes($category);
    $id = stripslashes($id);
    if((!$id)||(!$product_name) || (!$product_name) || (!$product_name) ||(!$category) || (!$product_name) || (!$product_name) || (!$product_name)){
        $msg = "Please fill all the input data!";
    }else{

                include_once("../scripts/connect.php");
                $sql = mysql_query("UPDATE product SET status='$status' ,name='$product_name',description='$product_description',price='$product_price',quantity='$product_quantity',category='$category'  WHERE id='$id'");

                $msg = "Product Successfully updated!";


        }



}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Inventory</title>
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="stylesheet" href="style/forms.css"/>
</head>
<body>



<div id="main_wrapper">

    <div id="header">
        <?php include_once('../templates/admin_header.php');?>
        <a id="logout"href="admin_logout.php"> <div class="btn btn-default logout">Logout</div></a>

        <?php include_once('../templates/admin_nav.php');?>
    </div>



    <section id="main_content">

        <br/>

        <form action="index.php" enctype="multipart/form-data" method="post">
            <table cellpadding="5" cellspacing="5" border="0">

                <tr>
                    <td align="left" colspan="2">
                        <h2>Update a Product in store</h2>
                    </td>
                </tr>
                <tr>
                    <td align="right"><label>Product ID:</label></td>
                    <td align="left"><input required autofocus type="text" name="id" placeholder="Enter Product ID..." class="text_input add" maxlength="10"/></td>
                </tr>

                <tr>
                    <td align="right"><label>Product Name:</label></td>
                    <td align="left"><input   type="text" name="product_name" placeholder="Enter Product name..." class="text_input add" maxlength="100"/></td>
                </tr>
                <tr>
                    <td align="right"><label>Description:</label></td>
                    <td align="left"><Textarea   style="height: 80px; width: 300px;padding: 5px;resize: none;" name="product_description" placeholder="Enter  description..." class="text_input add" ></textarea></td>
                </tr>
                <tr>
                    <td align="right"><label>Price:</label></td>
                    <td align="left">$&nbsp;<input  type="text" name="product_price" maxlength="10" placeholder="Enter Product price..." class="text_input" /></td>
                </tr>
                <tr>
                    <td align="right"><label>Quantity:</label></td>
                    <td align="left"><input   type="text" name="product_quantity"maxlength="7" placeholder="Enter Product quantity..." class="text_input add" /></td>
                </tr>

                <tr>
                    <td align="right"><label>Category:</label></td>
                    <td align="left"><select name="category"  class="text_input add" />
                        <option value="movie">Movies</option>
                        <option value="game">Games</option>
                        <option value="software">Softwares</option>

                    </td>
                </tr>

                <tr>
                    <td align="right"><label>Status:</label></td>
                    <td align="left"><select name="status"  class="text_input add" />
                        <option value="0">Unavailable</option>
                        <option value="1">Available</option>


                    </td>
                </tr>



                <tr >
                    <td  colspan="2" align="center"><input id="submit" type="submit" value="Done"/></td>

                </tr>
                <tr>
                    <td colspan="2" align="center"><?php echo $msg;?></td>
                </tr>
            </table>

        </form>
    </section>


    <?php include_once('../templates/admin_footer.php');?>


</div>


</body>
</html>