<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    
    <?php
        $stmt = $pdo->prepare("SELECT ROW_NUMBER() OVER (ORDER BY (SELECT NULL)) AS id,name,address,email FROM `member`");
        $stmt->execute();

        while ($row = $stmt->fetch()) :
        ?>

            <!-- เลข : <?=$row ["id"]?><br> -->
            ชื่อ : <?=$row ["name"]?><br>
            ที่อยู่ : <?=$row["address"]?><br>
            อีเมล์ : <?=$row["email"]?><br>
            <img src='../member_photo/<?=$row["id"]?>.jpg' width='100'><hr>
            
            <?php endwhile; ?>
    
        <?php while ($row = $stmt->fetch()) : ?>
            
            <?=$row ["pname"]?><br><?=$row ["price"]?> บาท
            
        <?php endwhile; ?>
        
    
</body></html>