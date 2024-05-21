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
        <script>
            function onJobReferenceChange(){
                const reference = document.getElementById("reference").value;
                console.log(reference);
                const button = document.getElementById("deleteButton");
                if (reference == ""){
                    button.hidden = true;
                }
                else {
                    button.hidden  = false;
                }
            }

            window.addEventListener('load', function () {
                onJobReferenceChange();
            })
        </script>
        <?php include 'nav.inc';?>
        <?php include_once("settings.php")?>
        <main>
            <h1 class="theme-dark heading" id="jobsPageHeading">Manager queries</h1>
            <div id="managerContainer" >
                <div class="glasspane">
                    <section id="managerForm">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <fieldset>
                                <legend class="theme-dark label">Search Options</legend>
                                
                                <span>
                                    <label class="theme-dark label" for="reference">Job Reference: </label>
                                    <select class="theme-dark select" id="reference" name="reference" onchange="onJobReferenceChange()">
                                        <option class="theme-dark option" value="">Please Select</option>
                                        <?php
                                            $query = "CALL sp_JobListings();";
                                            $result = mysqli_query(Settings::SQLConnection(),$query);

                                            while($row = mysqli_fetch_array($result)) {
                                                $Reference = $row["Reference"];
                                                $Title = $row["Title"];

                                                echo "<option class=\"theme-dark option\" value=\"$Reference\"";
                                                if((isset($_POST['reference'])))
                                                {
                                                    if($_POST['reference'] == $Reference)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                echo ">$Title</option>";
                                            }                                       
                                        ?>
                                    </select>
                                </span>

                                <span>
                                    <label class="theme-dark label" for="applicant">Applicant: </label>
                                    <select class="theme-dark select" id="applicant" name="applicant">
                                        <option class="theme-dark option" value="0">Please Select</option>
                                        <?php
                                            $query = "CALL sp_getApplicants(1);";
                                            $result = mysqli_query(Settings::SQLConnection(),$query);

                                            while($row = mysqli_fetch_array($result)) {
                                                $ApplicantId = $row["Id"];
                                                $Name = $row["LastName"].", ".$row["FirstName"];

                                                echo "<option class=\"theme-dark option\" value=\"$ApplicantId\"";
                                                
                                                if((isset($_POST['applicant'])))
                                                {
                                                    if($_POST['applicant'] == $ApplicantId)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                                echo ">$Name</option>";
                                            }
                                        ?>      
                                    </select>
                                </span>

                                <span>
                                    <label class="theme-dark label" for="search">Search: </label>
                                    <input class="theme-dark inputtext" type="text" id="search" name="search" 
                                        <?php 
                                        if((isset($_POST['search'])))
                                        {
                                            echo "value=\"".$_POST['search']."\"";
                                        }
                                        ?> 
                                    ><br>
                                </span>
                                <span>
                                    <input class="theme-dark submit" type="submit" name="command" value="submit">&nbsp;
                                    <input id="deleteButton" class="theme-dark submit" name="command" type="submit" value="Delete for this job reference" hidden>
                                </span>
                            </fieldset>
                        </form>
                    </section>
                    <section id="managerResults">
                        <h2 class="theme-dark heading">Results</h2>
                        <?php 
                            require_once(dirname(__FILE__)."/PHP/ManagerQueries.php");
                            ManagerQueriesResults()
                        ?>
                    </section>
                </div>
            </div>
        </main>
            <span class="circle fa-solid fa-star" id="circle_0_0"></span><span class="circle fa-solid fa-star" id="circle_0_1"></span><span class="circle fa-solid fa-star" id="circle_0_2"></span><span class="circle fa-solid fa-star" id="circle_0_3"></span><span class="circle fa-solid fa-star" id="circle_1_0"></span><span class="circle fa-solid fa-star" id="circle_1_1"></span><span class="circle fa-solid fa-star" id="circle_1_2"></span><span class="circle fa-solid fa-star" id="circle_1_3"></span><span class="circle fa-solid fa-star" id="circle_1_4"></span><span class="circle fa-solid fa-star" id="circle_2_0"></span><span class="circle fa-solid fa-star" id="circle_2_1"></span><span class="circle fa-solid fa-star" id="circle_2_2"></span><span class="circle fa-solid fa-star" id="circle_2_3"></span><span class="circle fa-solid fa-star" id="circle_3_0"></span><span class="circle fa-solid fa-star" id="circle_3_1"></span><span class="circle fa-solid fa-star" id="circle_3_2"></span><span class="circle fa-solid fa-star" id="circle_4_0"></span><span class="circle fa-solid fa-star" id="circle_4_1"></span><span class="circle fa-solid fa-star" id="circle_4_2"></span><span class="circle fa-solid fa-star" id="circle_4_3"></span><span class="circle fa-solid fa-star" id="circle_5_0"></span><span class="circle fa-solid fa-star" id="circle_5_1"></span><span class="circle fa-solid fa-star" id="circle_5_2"></span><span class="circle fa-solid fa-star" id="circle_5_3"></span><span class="circle fa-solid fa-star" id="circle_6_0"></span><span class="circle fa-solid fa-star" id="circle_6_1"></span><span class="circle fa-solid fa-star" id="circle_6_2"></span><span class="circle fa-solid fa-star" id="circle_7_0"></span><span class="circle fa-solid fa-star" id="circle_7_1"></span><span class="circle fa-solid fa-star" id="circle_7_2"></span><span class="circle fa-solid fa-star" id="circle_7_3"></span><span class="circle fa-solid fa-star" id="circle_8_0"></span><span class="circle fa-solid fa-star" id="circle_8_1"></span><span class="circle fa-solid fa-star" id="circle_8_2"></span><span class="circle fa-solid fa-star" id="circle_8_3"></span><span class="circle fa-solid fa-star" id="circle_8_4"></span><span class="circle fa-solid fa-star" id="circle_9_0"></span><span class="circle fa-solid fa-star" id="circle_9_1"></span><span class="circle fa-solid fa-star" id="circle_9_2"></span><span class="circle fa-solid fa-star" id="circle_9_3"></span><span class="circle fa-solid fa-star" id="circle_9_4"></span><span class="circle fa-solid fa-star" id="circle_10_0"></span><span class="circle fa-solid fa-star" id="circle_10_1"></span><span class="circle fa-solid fa-star" id="circle_10_2"></span><span class="circle fa-solid fa-star" id="circle_11_0"></span><span class="circle fa-solid fa-star" id="circle_11_1"></span><span class="circle fa-solid fa-star" id="circle_11_2"></span><span class="circle fa-solid fa-star" id="circle_12_0"></span><span class="circle fa-solid fa-star" id="circle_12_1"></span><span class="circle fa-solid fa-star" id="circle_12_2"></span><span class="circle fa-solid fa-star" id="circle_13_0"></span><span class="circle fa-solid fa-star" id="circle_13_1"></span><span class="circle fa-solid fa-star" id="circle_13_2"></span><span class="circle fa-solid fa-star" id="circle_13_3"></span><span class="circle fa-solid fa-star" id="circle_14_0"></span><span class="circle fa-solid fa-star" id="circle_14_1"></span><span class="circle fa-solid fa-star" id="circle_14_2"></span>

        <?php include 'footer.inc';?>
    </body>
</html>