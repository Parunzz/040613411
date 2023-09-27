<?php include "connect.php" ?>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE id=?");
        $stmt->bindParam(1, $_GET["id"]);
        $stmt->execute();
        $row = $stmt->fetch();
    ?>
<html>
<head><meta charset="utf-8"></head>
<body>
<form action="editformSQL.php" method="post">
    <input type="hidden" name="id" value="<?=$row["id"]?>">
    username : <input type="text" name="username" value="<?=$row["username"]?>"><br>
    password : <input type="text" name="password" value="<?=$row["password"]?>"><br>
    name : <input type="text" name="name" value="<?=$row["name"]?>"><br>
    address : <input type="text" name="address" value="<?=$row["address"]?>"><br>
    mobile : <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
    email : <input type="text" name="email" value="<?=$row["email"]?>"><br>
    <input type="submit" value="edit ">
</form>
</body>
</html>