<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type=text/css href ="start_style.css">
    <title>Suggestions</title>
</head>
<body style="margin: 0; background-color: #20156e;">
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
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
        <h1 style="margin: 0;">Start Party!</h1>
    </div>
    <form action="start.php" method="POST">
        <p name= "pub_title" 
        style="margin: 0; 
        text-align: center; 
        color: aliceblue;
        width: 340px; 
        font-size: larger;
        padding-bottom: 10px;
        ">Public Code</p>
        
        <input type="text" readOnly id="pub_code" name="public" placeholder="Public Code" value="<?php echo $_POST['public'] ?? ''; ?>">

        <p name= "pub_title" 
        style="margin: 0; 
        text-align: center; 
        color: aliceblue;
        width: 340px; 
        font-size: larger;
        padding-bottom: 10px;
        ">Private Code</p>


        <input type="text" readOnly id="priv_code" name="private" placeholder="Private Code" value="<?php echo $_POST['private'] ?? ''; ?>">

        <p name= "pub_title" 
        style="margin: 0; 
        text-align: center; 
        color: aliceblue;
        width: 340px; 
        font-size: 15px;
        ">(Codes are deleted 24 hours after generation)</p>

        <button type="submit" onclick="gen_codes()">
            Generate
        </button>
        
    </form>
    

    <script>
        function gen_codes()
        {
            var six_digit_pub = Math.floor(100000 + Math.random() * 900000);
            var pub_out = document.getElementById("pub_code");
            pub_out.value = six_digit_pub;
            pub_out.readOnly = true;


            var six_digit_priv = Math.floor(10000 + Math.random() * 90000);
            var priv_out = document.getElementById("priv_code");
            priv_out.value = six_digit_priv;
            priv_out.readOnly = true;

        }
       
    </script>

</body>
</html>

<?php
    error_reporting(E_ALL ^ E_NOTICE);  // silences the notices
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
       
    }

?>

