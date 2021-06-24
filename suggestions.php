<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type=text/css href ="suggestion_style.css">
    <title>Suggestions</title>
</head>
<body style="margin: 0; background-color: #20156e;">
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
    <script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>
    <div id="vantajs"></div>
    <script> 
    VANTA.NET({
    el: "#vantajs",
    mouseControls: false,
    touchControls: true,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x3b1ad7,
    backgroundColor: 0xe0322,
    maxDistance: 10.00
    })
    </script> -->

    
    
    <div class="page_title">
        <h1 style="margin: 0;">Suggestions?</h1>
    </div>
    <form action="connect.php" method="POST">
        <input type="text", name="code", placeholder="Enter Public Code">
        <input type="text", name="song", placeholder="Song Name">
        <input type="text", name="artist", placeholder="Artist Name">
        <input type="submit", name="Submit">
        <?php
        session_start();
        if(isset($_SESSION["message"]))
        {
            echo '<p
            style="margin: 0; 
            text-align: center; 
            color: aliceblue;
            width: 340px; 
            font-size: 30px;
            padding-bottom: 10px;
            padding-top: 5vh;
            ">Suggestion Successful!</p>';
            unset($_SESSION["message"]);
        }
        ?>

    </form>

</body>
</html>

