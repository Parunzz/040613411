<?php include "connect.php" ?>
<?php session_start(); ?>

<html>
<head><meta charset="utf-8"></head>
<?php
   // 1. กำหนดคำสั่ง SQL ให้ดึงสินค้าตามรหัสสินค้า
   $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
   $stmt->bindParam(1, $_GET["pid"]);  // 2. นำค่า pid ที่ส่งมากับ URL กำหนดเป็นเงื่อนไข        
   $stmt->execute(); 	// 3. เริ่มค้นหา
   $row = $stmt->fetch();	// 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>

<a href="cart.php?action=">สินค้าในตะกร้า (<?=sizeof($_SESSION['cart'])?>)</a>
<div style="display:flex">
<div>
     <img src='img/<?=$row["pid"]?>.jpg' width='200'>
</div>
<div style="padding: 15px">
    <h2><?=$row["pname"]?></h2>
    รายละเอียดสินค้า: <?=$row["pdetail"]?><br>
    ราคาขาย <?=$row["price"]?> บาท<br>
	<form method="post" action="cart.php?action=add&pid=<?=$row["pid"]?>&pname=<?=$row["pname"]?>&price=<?=$row["price"]?>">
		<input type="number" name="qty" value="1" min="1" max="9">
		<input type="submit" value="ซื้อ">	   
	</form>
</div>
</div>
</body>
</html>
