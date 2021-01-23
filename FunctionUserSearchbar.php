<!DOCTYPE html>

<?php 
	include("DataConnection1.php"); // database sql connection 
    ob_start(); // use for searchbar 
	session_start(); 
?>

<!-------------------------------------------------------------------------------->

<html>
<head></head>
<body>

    <form action="" method="post" style="margin-left:10px; margin-top:5px;">
        <input name="searchbar" type="text" placeholder="Type here" style="width:95%">
        <input name="search" type="submit" value="Search" style="width:80px">
    </form>

    <?php
    
    if(isset($_POST["search"]))
    {
        $search = $_POST["searchbar"];

        if($search == NULL)
        {
            ?>
                <script>
                    alert("Search cannot be NULL!");
                </script>
            <?php
        }

        else
        {
            $_SESSION["search"] = $search;
            header("Location: FunctionUserSearchbarForm.php"); //这边自己改你要link的address
            ob_end_flush();
        }
    }
    ?>

</body>
</html>





