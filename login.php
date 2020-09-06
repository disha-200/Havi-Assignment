<html>
    <head>
        <title>
            LOGIN
        </title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form method="POST" action="login.php">
        <div class="container">
            <h2>LOGIN</h2>
            <label>Name</label><br>
            <input name="name" type="text" placeholder="NAME" required><br><br>

            <label>Email</label><br>
            <input name="email" type="text" placeholder="EMAIL" required><br><br>

            <button type="submit" name="submit">LOGIN</button><br><br>
        </form>
        <?php
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    // Create connection
    $connect = mysqli_connect('localhost', 'root', '', 'havi');
    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT username, email FROM user WHERE username='$name' AND email='$email'";
    $result = mysqli_query($connect, $query);
?>

<?php
if (mysqli_num_rows($result) > 0) {
    header("location:list.php");
} else {
    echo "No record exists";
}

mysqli_close($connect);
}
?>
            <a href="index.html">NEW USER</a>&nbsp;&nbsp;
            <a href="admin.php">ADMIN</a>
        </div>
    </body>
</html>