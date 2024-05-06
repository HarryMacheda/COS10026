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
            <h1 class="theme-dark heading" id="jobsPageHeading">Careers</h1>

            <aside class="glasspane asideLinkList">
                <p>Shortcuts</p>
                <p><a class="theme-dark link" href="#LEDEV" >Lead Developer</a></p>
                <p><a class="theme-dark link" href="#WBDEV">Web Developer</a></p>
                <p><a class="theme-dark link" href="#HRREP">HR Representative</a></p>
            </aside>

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

        <footer>
            <p>Copyright &#169; 2024 NEBULA</p>
            <div>
                <a href="https://youtu.be/ZV7AfCQub1Q">Youtube</a>
                <a href="https://twitter.com/nebula2024">Twitter</a>
                <a href="mailto:103603101@student.swin.edu.au">Email</a>
                <a href="https://github.com/HarryMacheda/COS10026-Project">Github</a>
                <a>👋</a>
            </div>
        </footer>
    </body>
</html>