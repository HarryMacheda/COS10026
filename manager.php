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

            function Populatehiddenfields(application,status)
            {
                document.getElementById("hidUpdateApplicationId").value = application;
                document.getElementById("hidUpdateStatus").value = status;
                document.getElementById("hidUpdatePreviousCommand").value = document.getElementById("hidPrevCommand") ? document.getElementById("hidPrevCommand").value : "";
                document.managerSubmitForm.submit();
            }

        </script>
        <?php include 'nav.inc';?>
        <?php include_once("settings.php")?>
        <main>
            <h1 class="theme-dark heading" id="jobsPageHeading">Manager queries</h1>
            <div id="managerContainer" >
                <div class="glasspane">
                    <section id="managerForm">
                        <form name="managerSubmitForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input id="hidUpdateApplicationId" name="hidUpdateApplicationId" type="text" value="" hidden>
                            <input id="hidUpdateStatus" name="hidUpdateStatus" type="text" value="" hidden>
                            <input id="hidUpdatePreviousCommand" name="hidUpdatePreviousCommand" type="text" value="" hidden>
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
                        <h2 class="theme-dark label">Search Results</h2>
                        <?php 
                            require_once(dirname(__FILE__)."/PHP/ManagerQueries.php");
                            ManagerQueriesResults()
                        ?>
                    </section>
                </div>
            </div>
        </main>
        <?php include 'background.inc';?>

        <?php include 'footer.inc';?>
    </body>
</html>