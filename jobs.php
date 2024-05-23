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
            <span class="circle fa-solid fa-star" id="circle_0_0"></span><span class="circle fa-solid fa-star" id="circle_0_1"></span><span class="circle fa-solid fa-star" id="circle_0_2"></span><span class="circle fa-solid fa-star" id="circle_0_3"></span><span class="circle fa-solid fa-star" id="circle_1_0"></span><span class="circle fa-solid fa-star" id="circle_1_1"></span><span class="circle fa-solid fa-star" id="circle_1_2"></span><span class="circle fa-solid fa-star" id="circle_1_3"></span><span class="circle fa-solid fa-star" id="circle_1_4"></span><span class="circle fa-solid fa-star" id="circle_2_0"></span><span class="circle fa-solid fa-star" id="circle_2_1"></span><span class="circle fa-solid fa-star" id="circle_2_2"></span><span class="circle fa-solid fa-star" id="circle_2_3"></span><span class="circle fa-solid fa-star" id="circle_3_0"></span><span class="circle fa-solid fa-star" id="circle_3_1"></span><span class="circle fa-solid fa-star" id="circle_3_2"></span><span class="circle fa-solid fa-star" id="circle_4_0"></span><span class="circle fa-solid fa-star" id="circle_4_1"></span><span class="circle fa-solid fa-star" id="circle_4_2"></span><span class="circle fa-solid fa-star" id="circle_4_3"></span><span class="circle fa-solid fa-star" id="circle_5_0"></span><span class="circle fa-solid fa-star" id="circle_5_1"></span><span class="circle fa-solid fa-star" id="circle_5_2"></span><span class="circle fa-solid fa-star" id="circle_5_3"></span><span class="circle fa-solid fa-star" id="circle_6_0"></span><span class="circle fa-solid fa-star" id="circle_6_1"></span><span class="circle fa-solid fa-star" id="circle_6_2"></span><span class="circle fa-solid fa-star" id="circle_7_0"></span><span class="circle fa-solid fa-star" id="circle_7_1"></span><span class="circle fa-solid fa-star" id="circle_7_2"></span><span class="circle fa-solid fa-star" id="circle_7_3"></span><span class="circle fa-solid fa-star" id="circle_8_0"></span><span class="circle fa-solid fa-star" id="circle_8_1"></span><span class="circle fa-solid fa-star" id="circle_8_2"></span><span class="circle fa-solid fa-star" id="circle_8_3"></span><span class="circle fa-solid fa-star" id="circle_8_4"></span><span class="circle fa-solid fa-star" id="circle_9_0"></span><span class="circle fa-solid fa-star" id="circle_9_1"></span><span class="circle fa-solid fa-star" id="circle_9_2"></span><span class="circle fa-solid fa-star" id="circle_9_3"></span><span class="circle fa-solid fa-star" id="circle_9_4"></span><span class="circle fa-solid fa-star" id="circle_10_0"></span><span class="circle fa-solid fa-star" id="circle_10_1"></span><span class="circle fa-solid fa-star" id="circle_10_2"></span><span class="circle fa-solid fa-star" id="circle_11_0"></span><span class="circle fa-solid fa-star" id="circle_11_1"></span><span class="circle fa-solid fa-star" id="circle_11_2"></span><span class="circle fa-solid fa-star" id="circle_12_0"></span><span class="circle fa-solid fa-star" id="circle_12_1"></span><span class="circle fa-solid fa-star" id="circle_12_2"></span><span class="circle fa-solid fa-star" id="circle_13_0"></span><span class="circle fa-solid fa-star" id="circle_13_1"></span><span class="circle fa-solid fa-star" id="circle_13_2"></span><span class="circle fa-solid fa-star" id="circle_13_3"></span><span class="circle fa-solid fa-star" id="circle_14_0"></span><span class="circle fa-solid fa-star" id="circle_14_1"></span><span class="circle fa-solid fa-star" id="circle_14_2"></span>

        <?php include 'background';?>

        <footer>
            <?php include 'footer.inc';?>
        </footer>
    </body>
</html>