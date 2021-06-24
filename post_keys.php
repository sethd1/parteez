<?php
    $private = $_POST['private'];
    $public = $_POST['public'];

    // Database connection 
    $conn = new mysqli('localhost', 'root', '', 'suggest_app');
    if ($conn->connect_error)
    {
        die('Connection Failed : ' .$conn->connect_error);
    }else
    {
        $stmt = $conn->prepare("INSERT into User_Keys(private, public) values(?, ?)");
        $stmt->bind_param("ii", $private, $public);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        // stay on the same page after execution
        //header('location:start.php');
    }

?>
