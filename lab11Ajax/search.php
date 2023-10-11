<?php
include "./connect.php";
$keyword = $_GET["keyword"];
$sql = "SELECT * FROM member WHERE username LIKE'%$keyword%'";
$objQuery = $con->query($sql);
?>
<table border="1">
    <?php 
    while($row = mysqli_fetch_array($objQuery)): ?>
            <tr>
            <td><img src="member_photo/<?php echo $row["id"] ?>.jpg" alt=""></td>
            <td><?php echo $row["username"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["address"]?></td>
            <td><?php echo $row["email"]?></td>
            </tr>
    <?php endwhile;?>
</table>