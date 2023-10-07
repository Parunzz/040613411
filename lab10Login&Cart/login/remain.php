<?php session_start(); ?>
<?php include "connect.php" ;
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }
?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1><br>
<h1>สิทธิ <?=$_SESSION["privilege"]?></h1><br>
<h2>Order</h2>
<table border="1">
    <tr>
        <th>pid</th>
        <th>pname</th>
        <th>pdetail</th>
        <th>price</th>
        <th>remain</th>
    </tr>
    <?php 
        $stmt2 = $pdo->prepare("SELECT * FROM `product`");
        $stmt2->execute();
        while ($row2 = $stmt2->fetch()) {
        ?>
            <tr>
                <td><?=$row2 ["pid"]?></td>
                <td><?=$row2 ["pname"]?></td>
                <td><?=$row2 ["pdetail"]?></td>
                <td><?=$row2 ["price"]?></td>
                <td><?=$row2 ["remain"]?></td>
            </tr>  
    <?php              
            }
    ?>
</table>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br>
<a href='user-home.php'>Back</a><br>
</body>
</html>
