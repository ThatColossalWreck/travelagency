<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title id="title">Your Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="profile.css">
    <script src="http://localhost/Project/jquery-3.3.1.min.js"></script>
</head>
<body>
    <?php
        //Items in post: fullname, email, address, city, state, zip, cardname, cardnumber, expmonth, expyear, cvv, arrival, departure, hiddenPackageID, hiddenUserID
        
        $Temp = $_POST['hiddenUserID'];
        echo("<script>console.log('" . $Temp . "');</script>");

        $query = "insert into PTRANSACTIONS(PackageID, UserID, TransactionDate) values ('" . $_POST['hiddenPackageID'] . "', '" . $_POST['hiddenUserID'] . "', '" . date("Y-m-d") . "');";
        
        if( !($database = mysqli_connect("localhost", "iw3htp", "password"))) {
            echo("<h1>Error Processing Checkout</h1>");
            die("Could not connect to database</body></html>");
        }

        if ( !mysqli_select_db( $database, "BlackMesaTravel" ) ) {
            echo("<h1>Error Processing Checkout</h1>");
            die("Could not open database</body></html>");
        }

        $result = mysqli_query($database, $query);

        if($result === TRUE){
            echo("<h1> Checkout Completed! </h1>");
        }else{
            echo("<h1>Error Processing Checkout</h1>");
        }
    ?>
  <!-- Navigation Bar -->
  <ul class="navbar">
    <li id="navbranding" class="navitem"><a href="index.html">Black Mesa Travel</a></li>
    <li class="navitem"><a href="login.html">Login/Signup</a></li>
    <li class="navitem"><a href="packages.php">Premium Packages</a></li>
    <li class="navitem"><a href="#">Trending</a></li>
    <li class="navitem"><a href="index.html">Home</a></li>
  </ul>
  

</body>
</html>
