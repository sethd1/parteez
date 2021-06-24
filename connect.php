<?php
    session_start();
    $code = $_POST['code'];
    $song = $_POST['song'];
    $artist = $_POST['artist'];
    

    // Database connection 
    $conn = new mysqli('localhost', 'root', '', 'suggest_app');
    if ($conn->connect_error)
    {
        die('Connection Failed : ' .$conn->connect_error);
    }else
    {
        $stmt = $conn->prepare("INSERT into Suggestions(code, song, artist) values(?, ?, ?)");
        $stmt->bind_param("iss", $code, $song, $artist);
        $stmt->execute();
        $_SESSION['message']="Suggestion Successful!";
        Header( 'Location: suggestions.php' );
        $stmt->close();
        $conn->close();
    }
?>