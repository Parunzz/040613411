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
        <th>username</th>
        <th>ord_id</th>
        <th>ord_date</th>
        <th>product</th>
        <th>quantity</th>
        <th>orders_amount</th>
    </tr>
    <?php 
        $stmt2 = $pdo->prepare("SELECT * FROM `orders` INNER JOIN item ON orders.ord_id = item.ord_id INNER JOIN product ON item.pid = product.pid WHERE username = ?;");
        $username = $_GET["username"]; 
        $stmt2->bindParam(1,$username);
        $stmt2->execute();
        while ($row2 = $stmt2->fetch()) {
        ?>
            <tr>
                <td><?=$row2 ["username"]?></td>
                <td><?=$row2 ["ord_id"]?></td>
                <td><?=$row2 ["ord_date"]?></td>
                <td><?=$row2 ["pname"]?></td>
                <td><?=$row2 ["quantity"]?></td>
                <td><?=$row2 ["price"]?></td>
            </tr>  
    <?php              
            }
    ?>
</table>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br>
<a href='user-home.php'>Back</a><br>
</body>
</html>
