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
        <div id="applicationConfirmContainer">
        <h1 id="jobsPageHeading">Thank you for confirming your application!</h1>
          <div class="jobscontainer">
              <section id="Application Confirmation" class= "glasspane">
                      
                      
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
                            
                            echo "<p style=\"padding:70px 80px;\" style=\"text-align:center;\">"
                            ."We will get back to you shortly!<br>"
                            ."Feel free to keep applying <a class=\"theme-dark link\" href=\"./apply.php\">here.</a>"
                            ."</p>";
                          }
                  ?>
                </section>
            </div>
        </div>
        </main>
      <?php include 'background.inc';?>
      <footer>
      <?php include 'footer.inc';?>
    </footer>
  </body>
</html>
