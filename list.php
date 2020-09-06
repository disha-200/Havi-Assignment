<html>
    <head>
        <title>
            LIST
        </title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form method="POST" action="list.php">
        <div class="container">
            <label>Name</label><br>
            <input name="name" type="text" placeholder="NAME" required><br><br>

            <label>Enter Here: </label><br>
            <input name="item" type="text" placeholder="ENTER" required><br><br>

            <button type="submit" name="submit">ENTER</button><br><br>
        </form>
        <?php
if (isset($_POST['submit']))
{
    $item = $_POST['item'];
    $name = $_POST['name'];
    // Create connection
    $connect = mysqli_connect('localhost', 'root', '', 'havi');
    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE user set item='$item' WHERE username='$name'";
    $result = mysqli_query($connect, $query);

    if($result){
        $query = "SELECT item FROM user WHERE username='$name'";
        $result = mysqli_query($connect, $query);
    

?>
    <table border="2">
    <tr class="style3">
    <th>ITEM</th>

    <?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<div class='styling'>";
        echo "<tr class='style4'><td>{$row['item']}</td></tr>";
        echo "</div>";
    }
}
}
mysqli_close($connect);
}
?>
</tbody>
</table>
            <a href="index.html">NEW USER</a>&nbsp;&nbsp;
            <a href="admin.php">ADMIN</a>
        </div>
    </body>
</html>