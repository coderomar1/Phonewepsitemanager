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
        $sql = "SELECT * FROM users WHERE id=$id;";                
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $user = $row['name'];
            }
        
    ?>
<div class="formbody">       
    <form method="POST">
        <input type="number"  id="n" value="<?php echo $id?>" disabled>
        <input type="text" name="user" value="<?php echo $user?>" placeholder="new name">
        <input type="password" name="pass" placeholder="new password">
        <input type="submit" id="submit" name="sub" value="حفظ">
        <input type="button" id="submit" onclick="window.location='../main.php';"  value="الغاء">
    </form>
    <?php
            if(isset($_POST['sub'])){                
                $user = $_POST['user'];
                $pass = sha1($_POST['pass']);
                $conn = mysqli_connect('localhost','root','','UDB');
                $sql = "UPDATE users SET name='$user', pass='$pass' WHERE id=$id;";                
                $rusult = mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("Location:../main.php");
            }
        ?>
</div>
</body>
</html>