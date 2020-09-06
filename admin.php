<html>
    <head>
        <title>ADMIN</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body><center>
        <form method="POST" action="admin.php">
            <h2>LIST OF USERS</h2>
        </form>
        <?php
    // Create connection
    $connect = mysqli_connect('localhost', 'root', '', 'havi');
    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM user";
    $result = mysqli_query($connect, $query);
?>

<table border="2">
    <tr class="style3">
    <th>NAME</th>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>PH. NUMBER</th>
    <th>GENDER</th>
    <th>DOB</th>
    <th>ITEM</th>
    </tr>
    
    <tbody>

<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<div class='styling'>";
        echo "<tr class='style4'><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['pass']}</td><td>{$row['ph']}</td><td>{$row['gender']}</td><td>{$row['dob']}</td><td>{$row['item']}</td></tr>";
        echo "</div>";
    }
} else {
    echo "No record exists";
}

mysqli_close($connect);
?>
</tbody>
</table>
    <a href="index.html">BACK</a>
    </center>
    </body>
</html>