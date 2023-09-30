<?php include "connect.php" ?>
<?php
$statusMsg = "";
$targetDir = "../uploads/";

if (isset($_POST["submit"])) {
    if (!empty($_FILES["img"]["name"])) {
        $fileName = basename($_FILES["img"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow type
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email, id) VALUES (?, ?, ?, ?, ?, ?,'' )");
            
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->bindParam(2, $_POST["password"]);
            $stmt->bindParam(3, $_POST["name"]);
            $stmt->bindParam(4, $_POST["address"]);
            $stmt->bindParam(5, $_POST["mobile"]);
            $stmt->bindParam(6, $_POST["email"]);
            
            // Insert the record into the database
            $stmt->execute();

            // Get the last inserted ID
            $lastInsertedId = $pdo->lastInsertId();

            // Rename the file with the last inserted ID
            $newFileName = $lastInsertedId . ".jpg";
            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
                $statusMsg = "Image uploaded successfully. Last inserted ID: " . $lastInsertedId;
            } else {
                $statusMsg = "Error uploading your image.";
            }
        } else {
            $statusMsg = "Only jpg, jpeg, png files are allowed.";
        }
    } else {
        $statusMsg = "NO img selected.";
    }
} else {
    $statusMsg = "Please select file.";
}
echo $statusMsg;
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
    <br>สมัครสำเร็จ username คือ <?=$_POST["username"]?> <br>
    <a href="workshop8.php">NEXT</a><br>
</body>
</html>
