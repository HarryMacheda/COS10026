<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="description" content="Job submission page for Nebula">
      <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
      <meta name="author" content="Tristan Thorp">
      <title>Application Submission</title>
      <link rel="icon" type="image/x-icon" href="./tiny_logo.png">
      <link rel="stylesheet" href="./styles/style.css" />
      <link rel="stylesheet" href="./styles/all.css" />
      <meta name="theme-color" content="#F3F1DC"/> <!-- set the theme colour so mobile browsers set the background colour -->
      <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- set the viewport so we know the browsers width for mobile layouts -->
    </head>
    <body>
        <?php include 'nav.inc';?>
        <main>
            <?php
                require_once("settings.php");
                require_once(dirname(__FILE__)."/PHP/ApplicantEmail.php");

                function test_input ($input) {
                    $input = trim($input);
                    //$input = str_replace("","", $input);
                    //$input = preg_replace("","", $input);
                    $input = stripslashes($input);
                    $input = htmlspecialchars($input);
            
                    return $input;
                }

                    //Get applicant details
    $firstname = $lastname = $dob = $gender = $address = $suburb = $state = $postcode = $email = $phone = $otherSkills = "";
    $Err = Array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["firstname"])) {
            $Err[] = "Firstname is required";
        //if (empty($firstname = $_POST["firstname"])) {
        //    $firstnameErr = "Firstname is required";
        } else {
            $firstname = test_input($_POST["firstname"]);
        
        //check the name format
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname )){
            $Err[] = "Only letters and white space allowed";
            }
        }
        
        if (empty($_POST["surname"])) {
            $Err[] = "Lastname is required";
        //if (empty($lastname = $_POST["lastname"])) {
        //    $lastnameErr = "Lastname is required";
        } else {
            $lastname = test_input($_POST["surname"]);
        
            //check the name format
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname )){
            $Err[] = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["dob"])) {
            $Err[] = "DOB is required";
        //if (empty($dob = $_POST["dob"])) {
        //    $dobErr = "DOB is required";
        } else {
            $dob = test_input($_POST["dob"]);
        }

        if (empty($_POST["gender"])) {
            $Err[] = "Gender is required";
        //if (empty($gender = $_POST["gender"])) {
        //    $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        
        if (empty($_POST["address"])) {
        //if (empty($address = $_POST["address"])) {
            $Err[] = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
        }
        
        if (empty($_POST["suburb"])) {
        //if (empty($suburb = $_POST["suburb"])) {
            $Err[] = "Suburb is required";
        } else {
            $suburb = test_input($_POST["suburb"]);
        }

        if (empty($_POST["state"])) {
        //if (empty($state = $_POST["state"])) {
            $Err[] = "State is required";
        } else {
            $state = test_input($_POST["state"]);
        }

        if (empty($_POST["postcode"])) {
        //if (empty($postcode = $_POST["postcode"])) {
            $Err[] = "Postcode is required";
        } else {
            $postcode = test_input($_POST["postcode"]);
        }

        if (empty($_POST["email"])) {
        //if (empty($email = $_POST["email"])) {
            $Err[] = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        
        //check the email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $Err[] = "Invalid email format";
            }
        }

        if (empty($_POST["phone"])) {
        //if (empty($phone = $_POST["phone"])) {
            $Err[] = "Phone number is required";
        } else {
            $phone = test_input($_POST["phone"]);
        }

        $otherSkills = test_input($_POST["otherskills"]);



        echo "<h1 id=\"jobsPageHeading\">"
        ."Application "; 
        if(count($Err) > 0)
        {
            echo "unsuccessful";
        }
        else
        {
            echo "successful";
        }
        echo "</h1>";
        echo "<div class=\"jobscontainer\">"
        ."<section class=\"glasspane\" style=\"padding:10px;\">";
        if(count($Err) > 0)
        {
            foreach($Err as $ErrKey => $ErrValue)
            {
                echo "<p>$ErrValue</p>";
            }
            echo "<p>Please return to the <a class=\"theme-dark link\" href=\"./apply.php\">apply page</a> and fill out the required fields</p>";
        }
        else
        {
            $applicantID = 0;
            //create applicant or get them if the exist
            $conn = Settings::SQLConnection();
            $query = "CALL sp_createApplicant("
                ."\"$firstname\","
                ."\"$lastname\","
                ."\"$dob\","
                ."\"$gender\","
                ."\"$address\","
                ."\"$suburb\","
                ."\"$state\","
                ."\"$postcode\","
                ."\"$email\","
                ."\"$phone\","
                ."\"$otherSkills\","
                ."@applicantID);";



            $result = mysqli_query($conn, $query);
            mysqli_next_result($conn);
            $query = "SELECT @applicantID as ApplicantId";
            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_array($result);
            $applicantID = $row["ApplicantId"];

            $conn->close();
            if ($applicantID == 0) { echo "ERROR: Applicant was not created";}
            else {
                //Add applicant to job listing
                $reference = $_POST["reference"];
                $query = "SELECT Id From JobListing WHERE Reference = \"$reference\"";

                $conn = Settings::SQLConnection();
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $listingId = $row["Id"];
                $conn->close();

                $uuid = uniqid();

                if (!$listingId) {echo "<p>ERROR: Could not find job listing for reference: $reference</p>";}
                else {
                $query = "CALL sp_createJobApplication("
                ."0,'"
                .$uuid."',"
                ."$listingId,"
                ."$applicantID,"
                ."'".date("Y-m-d h:i:s")."'"
                .");";
                $conn = Settings::SQLConnection();
                $result = mysqli_query($conn, $query);
                $conn->close();
                }

                //Add applicants skills (even if we dont have a valid listing)
                $skills = $_POST["skills"];
                foreach( $skills as $skill ) {
                    $query = "CALL sp_AddSkillsApplicant($applicantID,$skill)";
                    $conn = Settings::SQLConnection();
                    $result = mysqli_query($conn, $query);
                    $conn->close();
                }

                ApplicantEmail($applicantID, $listingId, $uuid);

                echo"<p style=\"padding: 5%;\">Thanks for your interest in working at Nebula, please check your email to confirm your application</p>";
            }

        }
        echo "</section>"
        ."</div>";

        }

            ?>
        </main>
        <?php include 'background.inc';?>
        <footer>
            <?php include 'footer.inc';?>
        </footer>
    </body>
</html>