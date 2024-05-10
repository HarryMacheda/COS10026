<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Job application page for Nebula">
        <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
        <meta name="author" content="Harry Macheda">
        <title>Job Application</title>
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

            <!--
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
            -->
            
              <?php include 'nav.inc';?>
            </nav>
        <main>
            <?php
                $queries = array();
                parse_str($_SERVER['QUERY_STRING'], $queries);
                if(array_key_exists("ref", $queries)) {
                    $JOB_REFERENCE = $queries["ref"];
                }
                else { 
                    $JOB_REFERENCE = false;
                }
            ?>
            <h1 id="appplyPageHeading" class="theme-dark heading">Apply Here</h1>
            <div id="applyformcontainer">
                <div class="glasspane">
                    <form id="applyForm" method="post" action="./submit_application.php">
                        <label class="theme-dark label" for="reference">Job reference number: </label>
                        <?php
                            if($JOB_REFERENCE){
                                echo "<input class=\"theme-dark inputnumber\" type=\"text\" id=\"reference\" name=\"reference\" pattern=\"[0-9a-zA-Z]{5}\" required=\"required\" value=\"$JOB_REFERENCE\"><br>";
                            }
                            else
                            {
                                echo "<input class=\"theme-dark inputnumber\" type=\"text\" id=\"reference\" name=\"reference\" pattern=\"[0-9a-zA-Z]{5}\" required=\"required\"><br>";
                            }
                        ?>
                        <label class="theme-dark label" for="firstname">First name: </label>
                        <input class="theme-dark inputtext" type="text" id="firstname" name="firstname" pattern="[a-zA-Z]{1,20}"  required="required"><br>
                        <label class="theme-dark label" for="surname">Surname: </label>
                        <input class="theme-dark inputtext"  type="text" id="surname" name="surname" pattern="[a-zA-Z]{1,20}"  required="required"><br>
                        <label class="theme-dark label" for="dob">Date of birth: </label>
                        <input class="theme-dark inputdate" type="date" id="dob" name="dob" required="required"><br>
                        <!-- This field set is for the gender selector-->
                        <fieldset id="applyGenderOptions" class="theme-dark">
                            <legend class="theme-dark label">Gender</legend>
                            <span>
                                <input class="theme-dark inputradio" type="radio" name="gender" id="gender-female" value="female"  required="required">
                                <label class="theme-dark label" for="gender-female">Female</label>
                            </span>
                            <span>
                                <input class="theme-dark inputradio" type="radio" name="gender" id="gender-male" value="male">
                                <label class="theme-dark label" for="gender-male">Male</label>
                            </span>
                            <span>
                                <input class="theme-dark inputradio" type="radio" name="gender" id="gender-nonbinary" value="nonbinary">
                                <label class="theme-dark label" for="gender-nonbinary">Non-Binary/Gender Non-Conforming</label>
                            </span>
                            <span>
                                <input class="theme-dark inputradio" type="radio" name="gender" id="gender-exclude" value="exclude">
                                <label class="theme-dark label" for="gender-exclude">Prefer not to say</label>
                            </span>
                            <span>
                                <input class="theme-dark inputradio" type="radio" name="gender" id="gender-other" value="other">
                                <label class="theme-dark label" for="gender-other">Other</label>
                            </span>
                        </fieldset><br><br>
                        <label class="theme-dark label" for="address">Address: </label>
                        <input class="theme-dark inputtext" type="text" id="address" name="address" pattern="[0-9a-zA-Z\s]{1,40}" required="required"><br>
                        <label class="theme-dark label" for="suburb">Suburb/Town: </label>
                        <input class="theme-dark inputtext" type="text" id="suburb" name="suburb" pattern="[0-9a-zA-Z]{1,40}" required="required"><br>
                        <label class="theme-dark label" for="state">State</label>
                        <select class="theme-dark select" id="state" name="state"  required="required">
                            <option class="theme-dark option" value="">Please Select</option>
                            <option class="theme-dark option" value="VIC">VIC</option>
                            <option class="theme-dark option" value="NSW">NSW</option>
                            <option class="theme-dark option" value="QLD">QLD</option>
                            <option class="theme-dark option" value="NT">NT</option>
                            <option class="theme-dark option" value="WA">WA</option>
                            <option class="theme-dark option" value="SA">SA</option>
                            <option class="theme-dark option" value="TAS">TAS</option>
                            <option class="theme-dark option" value="ACT">ACT</option>
                        </select>
                        <br>
                        <label class="theme-dark label" for="postcode">Postcode: </label>
                        <input class="theme-dark inputnumber" type="text" id="postcode" name="postcode" pattern="[0-9]{4}" required="required"><br>
                        <label class="theme-dark label" for="email">Email: </label>
                        <input class="theme-dark inputtext" type="text" id="email" name="email"  required="required"><br>
                        <label class="theme-dark label" for="phone">Phone: </label>
                        <input class="theme-dark inputtext" type="text" id="phone" name="phone" pattern="[0-9\s]{8,12}" required="required"><br>
                        <!-- This field set is for the gender selector-->
                        <fieldset id="applySkillsOptions" class="theme-dark">
                            <legend class="theme-dark label">Skills</legend>

                            <?php 
                               require_once("settings.php");
                               $conn = Settings::SQLConnection();
                               $query = "CALL sp_getSkills";
                               $result = mysqli_query($conn, $query);
                               while($row = mysqli_fetch_assoc($result))
                               {
                                 echo "<span>"
                                 . "<input class=\"theme-dark inputcheckbox\" type=\"checkbox\" name=\"skills[]\" id=\"skill-".$row["Id"]."\" value=\"".$row["Id"]."\">"
                                 . "<label class=\"theme-dark label\" for=\"skill-".$row["Id"]."\">".$row["name"]."</label>"
                             
                                 ."</span>";
                               }
                            ?>    
                        </fieldset><br><br>
                        <label class="theme-dark label" for="otherskills">Other skills: </label>
                        <textarea class="theme-dark inputtext" id="otherskills" name="otherskills" rows="4" cols="30"></textarea><br><br>
                        <input class="theme-dark submit" type="submit" value="Apply">&nbsp;<input class="theme-dark submit" type="reset" value="Reset Form">
                    </form>
                </div>
            </div>
        </main>
            <span class="circle fa-solid fa-star" id="circle_0_0"></span><span class="circle fa-solid fa-star" id="circle_0_1"></span><span class="circle fa-solid fa-star" id="circle_0_2"></span><span class="circle fa-solid fa-star" id="circle_0_3"></span><span class="circle fa-solid fa-star" id="circle_1_0"></span><span class="circle fa-solid fa-star" id="circle_1_1"></span><span class="circle fa-solid fa-star" id="circle_1_2"></span><span class="circle fa-solid fa-star" id="circle_1_3"></span><span class="circle fa-solid fa-star" id="circle_1_4"></span><span class="circle fa-solid fa-star" id="circle_2_0"></span><span class="circle fa-solid fa-star" id="circle_2_1"></span><span class="circle fa-solid fa-star" id="circle_2_2"></span><span class="circle fa-solid fa-star" id="circle_2_3"></span><span class="circle fa-solid fa-star" id="circle_3_0"></span><span class="circle fa-solid fa-star" id="circle_3_1"></span><span class="circle fa-solid fa-star" id="circle_3_2"></span><span class="circle fa-solid fa-star" id="circle_4_0"></span><span class="circle fa-solid fa-star" id="circle_4_1"></span><span class="circle fa-solid fa-star" id="circle_4_2"></span><span class="circle fa-solid fa-star" id="circle_4_3"></span><span class="circle fa-solid fa-star" id="circle_5_0"></span><span class="circle fa-solid fa-star" id="circle_5_1"></span><span class="circle fa-solid fa-star" id="circle_5_2"></span><span class="circle fa-solid fa-star" id="circle_5_3"></span><span class="circle fa-solid fa-star" id="circle_6_0"></span><span class="circle fa-solid fa-star" id="circle_6_1"></span><span class="circle fa-solid fa-star" id="circle_6_2"></span><span class="circle fa-solid fa-star" id="circle_7_0"></span><span class="circle fa-solid fa-star" id="circle_7_1"></span><span class="circle fa-solid fa-star" id="circle_7_2"></span><span class="circle fa-solid fa-star" id="circle_7_3"></span><span class="circle fa-solid fa-star" id="circle_8_0"></span><span class="circle fa-solid fa-star" id="circle_8_1"></span><span class="circle fa-solid fa-star" id="circle_8_2"></span><span class="circle fa-solid fa-star" id="circle_8_3"></span><span class="circle fa-solid fa-star" id="circle_8_4"></span><span class="circle fa-solid fa-star" id="circle_9_0"></span><span class="circle fa-solid fa-star" id="circle_9_1"></span><span class="circle fa-solid fa-star" id="circle_9_2"></span><span class="circle fa-solid fa-star" id="circle_9_3"></span><span class="circle fa-solid fa-star" id="circle_9_4"></span><span class="circle fa-solid fa-star" id="circle_10_0"></span><span class="circle fa-solid fa-star" id="circle_10_1"></span><span class="circle fa-solid fa-star" id="circle_10_2"></span><span class="circle fa-solid fa-star" id="circle_11_0"></span><span class="circle fa-solid fa-star" id="circle_11_1"></span><span class="circle fa-solid fa-star" id="circle_11_2"></span><span class="circle fa-solid fa-star" id="circle_12_0"></span><span class="circle fa-solid fa-star" id="circle_12_1"></span><span class="circle fa-solid fa-star" id="circle_12_2"></span><span class="circle fa-solid fa-star" id="circle_13_0"></span><span class="circle fa-solid fa-star" id="circle_13_1"></span><span class="circle fa-solid fa-star" id="circle_13_2"></span><span class="circle fa-solid fa-star" id="circle_13_3"></span><span class="circle fa-solid fa-star" id="circle_14_0"></span><span class="circle fa-solid fa-star" id="circle_14_1"></span><span class="circle fa-solid fa-star" id="circle_14_2"></span>

        <footer>
            <?php include 'footer.inc';?>
        </footer>
    </body>
</html>