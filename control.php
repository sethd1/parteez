<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="control_style.css">
    <style type="text/css">
        table
        {
            border-collapse: collapse;
            min-width: 500px;
            color: black;
            font-size: 25px;
            text-align: left;
            margin-left: auto;
            margin-right: auto;
        }

        th, tr, table
        {
            color: black;
        }

        th, tr
        {
            padding: 10px;
        }

        tr:nth-child(even)
        {
            background-color: aliceblue;
        }

        tr:nth-child(odd)
        {
            background-color: lightgrey;
        }

    </style>
    <title>Control Party</title>
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
        <h1 style="margin: 0;">Control Party!</h1>
    </div>
    <form action="control.php" method="POST">
        <p name= "pub_title" 
            style="margin: 0; 
            text-align: center; 
            color: aliceblue;
            width: 340px; 
            font-size: larger;
            padding-bottom: 10px;
            ">Private Code</p>
        <input type="text" name="code" id="priv" placeholder="Enter Private Code">
        <input type="submit", name="Submit">
    </form>

    <table id="sugg_table">
        <tr>
            <th>Public Code</th>
            <th>Song</th>
            <th>Artist</th>
        </tr> 
        <?php   
        error_reporting(E_ALL ^ E_NOTICE); // silences all the notices
        $private = $_POST['code'];

        $conn = new mysqli('localhost', 'root', '', 'suggest_app');
        $sql_q1 = "SELECT * FROM User_Keys WHERE private = $private";

        $key_results = mysqli_query($conn, $sql_q1);
        
        if ($key_results)
        {
            if (mysqli_num_rows($key_results))
            {
                while ($row = mysqli_fetch_assoc($key_results))
            {
                $public_key = $row['public'];
                
            }
            }
        }

        $sql_q2 = "SELECT * FROM Suggestions WHERE Suggestions.code = $public_key ORDER BY id DESC";
        $data_results = mysqli_query($conn, $sql_q2);
       
        
       if ($data_results)
       {
           if (mysqli_num_rows($data_results))
           {
            while ($row = mysqli_fetch_assoc($data_results))
            {
                echo "<tr><td>" . $row['code'] . "</td><td>" . $row['song'] . "</td><td>" . $row['artist'] . "</td></tr>";
            }
           }else
           {
               echo "No resuls found!";
           }
       }

       $conn->close();

    ?>
    </table>
    
    

</body>
</html>

