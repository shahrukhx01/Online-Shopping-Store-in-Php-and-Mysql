<?php
session_start();
include('scripts/connect.php');
if(isset($_POST['product_id'])) {

    $mem_id =  $_SESSION['id'];
    $id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $sales=$_POST['sales'];
    $id = preg_replace('#[^0-9]#i', '', $id);
    $product_price = preg_replace('#[^0-9]#i', '', $product_price);
    $sql = "SELECT * from cart where mem_id='$mem_id' LIMIT 1";
    if ($query_run = mysql_query($sql)) {

        $row = mysql_fetch_assoc($query_run);
        $con = mysql_num_rows($query_run);

        if ($con == 1) {
            $quantity = ($row['quantity']) + 1;
            $cart = $row['cart'];
            $total = $row['total'];

            $bill = $total + $product_price;

            $pro_quantity=($_POST['product_quantity']);
            if($pro_quantity>0)
            {
                $pro_quantity--;
                $sales++;
                $result2 = mysql_query("update cart SET cart='$cart,$id',total='$bill',quantity='$quantity' WHERE mem_id='$mem_id' LIMIT 1");

                if($pro_quantity==0)
                {
                    $result3 = mysql_query("update product SET status='0' WHERE id='$id' LIMIT 1");

                }
            }
            $result4 = mysql_query("update product SET quantity='$pro_quantity',sales='$sales' WHERE id='$id' LIMIT 1");
            header("location: cart.php");
        } else {



            $pro_quantity=($_POST['product_quantity']);
            if($pro_quantity>0)
            {
                $pro_quantity--;
                mysql_query("INSERT into cart(mem_id,cart,total,quantity) values ('$mem_id','$id','$product_price',1)");
                if($pro_quantity==0)
                {
                    $result3 = mysql_query("update product SET status='0' WHERE id='$id' LIMIT 1");

                }
            }

            header("location: cart.php");
            exit();
        }


    }
}
?>

