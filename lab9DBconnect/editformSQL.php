<?php include "connect.php" ?>

<?php


$statusMsg = "";
$targetDir = "../uploads/";

if (isset($_POST["submit"])) {
    $stmt = $pdo->prepare("UPDATE member SET username=?, password=?, name=?, address=?, mobile=?, email=? WHERE id=?");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->bindParam(7, $_POST["id"]);
    if ($stmt->execute())
        echo "แก้ไข user " . $_POST["username"] . " สำเร็จ";
    if (!empty($_FILES["img"]["name"])) {
        $fileName = basename($_FILES["img"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow type
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            
            // Get the last inserted ID
            $UpdateId = $_POST["id"];

            // Rename the file with the last inserted ID
            $newFileName = $UpdateId . ".jpg";
            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
                $statusMsg = "Image uploaded successfully. Last inserted ID: " . $UpdateId;
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
echo "<br><a href='workshop8.php'>Back</a>";
?>

