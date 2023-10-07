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
        <?php 
        if($_SESSION['privilege'] == "member"){
        ?>
        <th>username</th>
        <th>Date</th>
        <th>Product</th>
        <th>price</th>
        <th>quantity</th>
        <th>status</th>
        <?php 
        }
        else if($_SESSION['privilege'] == "admin"){
            ?>
            <th>username</th>
            <th>orders_amount</th>
            <?php 
        }
        ?>
    </tr>
    <?php 
        $stmt = $pdo->prepare("SELECT * FROM `orders` INNER JOIN item ON orders.ord_id = item.ord_id INNER JOIN product ON item.pid = product.pid WHERE orders.username = ?");
        $stmt->bindParam(1,$_SESSION["username"]);
        $stmt->execute();
        
        $stmt2 = $pdo->prepare("SELECT *,COUNT(DISTINCT orders.ord_id) AS orders_amount FROM `orders` INNER JOIN item ON orders.ord_id = item.ord_id INNER JOIN product ON item.pid = product.pid GROUP BY username;");
        $stmt2->execute();
        if($_SESSION['privilege'] == "member"){
                while ($row = $stmt->fetch()) {
                    ?>
                <tr>
                    <td><?=$row ["username"]?></td>
                    <td><?=$row ["ord_date"]?></td>
                    <td><?=$row ["pname"]?></td>
                    <td><?=$row ["price"]?></td>
                    <td><?=$row ["quantity"]?></td>
                    <td><?=$row ["status"]?></td>
                </tr>
                <?php
            }
        }
            else{
                while ($row2 = $stmt2->fetch()) {
            ?>
                <tr>
                    <td><?=$row2 ["username"]?></td>
                    <!-- <td> <a href="admin-order.php?username=<?php $row2 ["username"]?>"> <?=$row2 ["orders_amount"]?></a></td> -->
                    <td> <a href="admin-order.php?username=<?= $row2["username"] ?>"><?= $row2["orders_amount"] ?></a></td>
    
                </tr>  
    <?php              
                }
            }
    ?>
</table>
<?php if($_SESSION['privilege'] == "admin"){ 
?>
    <a href="remain.php">remain product</a><br>
<?php 
}
?>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br>
<a href="../cart/index.php">ซื้อสินค้า</a>
</body>
</html>
