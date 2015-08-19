<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/search_style.css"/>
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>

</head>

<body>

<form action="#" method="post">
    <p id="txt">Search Product:&nbsp;&nbsp;<input type="text" id="search"/></p>
    <div id="results" ></div>
</form>

</body>
</html>
<script type="text/javascript">
    $('#search').keyup(function(){
        var search_item=$(this).val();
        $.post('search_db.php',{search_item:search_item},function(data){

            $('#results').html(data);
        });
    });
</script>
