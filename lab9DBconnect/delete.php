<?php include "connect.php" ?>
<?php
    // เตรียมค าสงั่ SQL สาหรับลบข้อมูล

    $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
    $stmt->bindParam(1, $_GET["username"]); // ก าหนดค่าลงในต าแหน่ง ?
    if ($stmt->execute()) // เริ่มลบข้อมูล
        header("location: workshop8.php"); // กลับไปแสดงผลหน้าข้อมูล
?>