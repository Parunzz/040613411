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
        if (!empty($row["id"])) {
            // Generate the image URL based on the filename in the "uploads" folder
            $imageFileName = $row["id"];
            $imagePath = "../uploads/" . $imageFileName . ".jpg";
            echo '<img src="' . $imagePath . '" alt="User Image" width="200"><br>';
            
        } else {
            echo 'No image uploaded<br>';
        }
        
        echo "<a href='workshop9.php?id=" . $row ["id"] . "'>แก้ไข</a> | ";
        echo "<a href='#' onclick='confirmDelete(\"" . $row["username"] . "\")'>ลบ</a><br>";
        
        echo "<hr>\n";
    }
    ?>
</body>
</html>