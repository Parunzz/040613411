<html>
<head><meta charset="UTF-8"></head>
<body>

    <form action="insert-member.php" method="post" enctype="multipart/form-data">
    username : <input type="text" name="username"><br>
    password : <input type="text" name="password"><br>
    name : <input type="text" name="name"><br>
    address : <input type="text" name="address"><br>
    mobile : <input type="text" name="mobile"><br>
    email : <input type="text" name="email"><br>
    <label for="img">Select image:</label>
    <input type="file" name="img" accept="image/*"><br>
    <input type="submit" name="submit" value="submit">

    </form>
</body>
</html>