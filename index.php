<?php
if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ph = $_POST['ph'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    // Create connection
    $connect = mysqli_connect('localhost', 'root', '', 'havi');

    // Check connection
    if ($connect) 
    {
        //stored procedure
        //$query = "CALL `insert_student`('$id','$name','$password','$gender','$dob','$addr') ";

        $query = "INSERT INTO user (username, email, pass, ph, gender, dob) VALUES ( '$name' ,'$email', '$password' ,'$ph', '$gender' , '$dob')";

        $result = mysqli_query($connect, $query);

        if ($result) 
        {
            echo "DONE";
        } elseif(!$result) {
            echo "Error: " . $query . "<br>" . $connect->connect_error;
        }
    } 
    else
    {
        die("Connection failed: " . mysqli_connect_error());
    }
}
?>