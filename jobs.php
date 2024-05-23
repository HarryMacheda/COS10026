<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Available jobs page for Nebula">
        <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
        <meta name="author" content="Tristan Thorp">
        <title>Available Positions</title>
        <link rel="icon" type="image/x-icon" href="./images/tiny_logo.png">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/all.css">
        <meta name="theme-color" content="#F3F1DC"> <!-- set the theme colour so mobile browsers set the background colour -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- set the viewport so we know the browsers width for mobile layouts -->
    </head>
    <body>
        <?php include 'nav.inc';?>
        <main>
            <h1 class="theme-dark heading" id="jobsPageHeading">Careers</h1>

            <?php 
                require_once("settings.php");
                require_once(dirname(__FILE__)."/PHP/JobApplication.php");

                $query = "CALL sp_JobListings()";
                $result = mysqli_query(Settings::SQLConnection(),$query);

                echo "<aside class=\"glasspane asideLinkList\">"
                ."<p>Shortcuts</p>";

                while($row = mysqli_fetch_array($result)) {
                    $Reference = $row["Reference"];
                    $Title = $row["Title"];

                    echo "<p><a class=\"theme-dark link\" href=\"#".$Reference."\" >". $Title."</a></p>";
                }

                echo "</aside>"
            ?>

            <div class="jobscontainer">
                <?php 
                    require_once("settings.php");
                    require_once(dirname(__FILE__)."/PHP/JobApplication.php");

                    $query = "CALL sp_JobListings()";
                    $result = mysqli_query(Settings::SQLConnection(),$query);

                    while($row = mysqli_fetch_array($result)) {
                        $jobApplication = new JobApplication($row["Id"]);
                        $jobApplication->Load(Settings::SQLConnection());
                        echo $jobApplication->ToHtml();
                    }
                ?>
            </div>
        <a class="applylink" href="apply.html">
            <span class="glasspane pencilcontainer" >
                <em class="fa-solid fa-pencil fa-shake pencilicon" aria-hidden="true"></em>
                <span class="joinUs">Sound great? Fill out our Application Form to apply now!</span>
            </span>
        </a>
        </main>

        <?php include 'background.inc';?>

        <footer>
            <?php include 'footer.inc';?>
        </footer>
    </body>
</html>