<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="description" content="Apllication confirming page for Nebula" >
    <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
    <meta name="author" content="Harry Macheda">
    <title>Application Confirmation</title>
    <link rel="icon" type="image/x-icon" href="./tiny_logo.png" >
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/all.css">
    <meta name="theme-color" content="#F3F1DC">
    <!-- set the theme colour so mobile browsers set the background colour -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- set the viewport so we know the browsers width for mobile layouts -->
  </head>
  <body>
      <?php include 'nav.inc';?>
      <main>
        <?php
            require_once("settings.php");
            $queries = array();
                parse_str($_SERVER['QUERY_STRING'], $queries);
                if(array_key_exists("token", $queries)) {
                    $token = $queries["token"];
                }
                else { 
                    $token = "";
                }

                if($token == "") {
                  echo "<p> ERROR: Link provided is invalid.</p>";
                }
                else {
                  $conn = Settings::SQLConnection();
                  $query = "CALL sp_updateJobApplication(0,\"$token\",1)";

                  $result = mysqli_query($conn, $query);
            
                  echo "<p>Thank you for confirming your application</p>"
                  ."<p>You will here back from us shortly</p>";
                }
        ?>
        </main>
        <?php include 'background.inc';?>
      <footer>
      <?php include 'footer.inc';?>
    </footer>
  </body>
</html>
