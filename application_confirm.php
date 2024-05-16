<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="description" content="Group information" >
    <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
    <meta name="author" content="Harry Macheda">
    <title>About Us</title>
    <link rel="icon" type="image/x-icon" href="./tiny_logo.png" >
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/all.css">
    <meta name="theme-color" content="#F3F1DC">
    <!-- set the theme colour so mobile browsers set the background colour -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- set the viewport so we know the browsers width for mobile layouts -->
  </head>
  <body>
    <nav>
      <!-- Nav bar
          Each page has its own span
          Inside the span is another span with a font awesome icon
          This span is set to aria-hidden so it is ignored by screen readers
          We want to hide this as otherwise it will read both icon and link which is redundent
          Then we have a href with a link to the relevant page
      -->
        <img src="./images/tiny_logo.png" alt="">
          <div id="navDesktop">
            <a href="./index.html"><span class="fa-solid fa-house" aria-hidden="true"></span>Home</a>
            <a href="./jobs.html"><span class="fa-solid fa-user-tie" aria-hidden="true"></span>Jobs</a>
            <a href="./apply.html"><span class="fa-solid fa-file-contract" aria-hidden="true"></span>Application</a>
            <a href="./about.html"><span class="fa-solid fa-people-group" aria-hidden="true"></span>About Us</a>
            <a href="./enhancements.html"><span class="fa-solid fa-star" aria-hidden="true"></span>Enhancements</a>
          </div>
          <div id="navMobile">
            <span class="fa-solid fa-bars" aria-hidden="true" onclick=""></span>
            <div>
              <a href="./index.html"><span class="fa-solid fa-house" aria-hidden="true"></span>Home</a>
              <a href="./jobs.html"><span class="fa-solid fa-user-tie" aria-hidden="true"></span>Jobs</a>
              <a href="./apply.html"><span class="fa-solid fa-file-contract" aria-hidden="true"></span>Application</a>
              <a href="./about.html"><span class="fa-solid fa-people-group" aria-hidden="true"></span>About Us</a>
              <a href="./enhancements.html"><span class="fa-solid fa-star" aria-hidden="true"></span>Enhancements</a>
            </div>
            </div>
      </nav>
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
      <footer>
      <?php include 'footer.inc';?>
    </footer>
  </body>
</html>
