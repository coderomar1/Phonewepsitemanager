<?php
    session_start();
    if(!(isset($_SESSION['user'])))
        header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style><?php include '../css/style.css'; ?></style>
<body>
    <?php 
       $conn = mysqli_connect('localhost','root','','UDB');
       $id = $_GET['id'];
       $sql = "SELECT * FROM data WHERE Phone_id=$id;";                
       $result = mysqli_query($conn, $sql) OR die('u cant query');
       mysqli_close($conn);
           if(mysqli_num_rows($result) > 0){
               $row = mysqli_fetch_assoc($result);
               $name = $row['Phone_name'];
               $color = $row['Phone_color'];
               $num = $row['P_num'];
               $date = $row['Release_date'];
           }
        
    ?>
<div class="formbody">   
    <form method="POST">
        <input type="number"  id="n" value="<?php echo $id?>" disabled require>
        <input type="text" name="name" value="<?php echo $name?>" placeholder="new name" require>
        <input type="color" name="color" value="<?php echo $color?>" placeholder="new name" require>
        <input type="number" name="num" value="<?php echo $num?>" placeholder="new num" require>
        <input type="date" name="date" value="<?php echo $date?>" placeholder="new date" require>
        <input type="submit" id="submit" name="sub" value="حفظ">
        <input type="button" id="submit" onclick="window.location='../data.php';"  value="الغاء">
    </form> 
    <?php
            if(isset($_POST['sub'])){                
                $name = $_POST['name'];
                $color = $_POST['color'];
                $num = $_POST['num'];
                $date = $_POST['date'];
                $conn = mysqli_connect('localhost','root','','UDB');
                $sql = "UPDATE data SET Phone_name='$name', Phone_color='$color', P_num='$num', Release_date='$date' WHERE Phone_id=$id;";                
                $rusult = mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("Location:../data.php");
            }
        ?>
</div>
</body>
</html>