<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
<script>
function confirmDelete(username) { 
    var ans = confirm("ต้องการลบ member Username:" + username); 
    if (ans==true) 
        document.location = "delete.php?username=" + username; 
}
</script>
</head>
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "username : " . $row ["username"] . "<br>";
        echo "name : " . $row ["name"] . "<br>";
        echo "Address : " . $row ["address"] . "<br>";
        echo "email : " . $row ["email"] . "<br>";
        echo "<a href='workshop9.php?id=" . $row ["id"] . "'>แก้ไข</a> | ";
        echo "<a href='#' onclick='confirmDelete(\"" . $row["username"] . "\")'>ลบ</a>";

        echo "<hr>\n";
    }
    ?>
</body>
</html>