<?PHP

require_once(getcwd().'/settings.php');

function ApplicantEmail($applicantID, $listingId, $UniqueID){

    //Load Applicant info
    $conn = Settings::SQLConnection();
    $query = "CALL sp_getApplicantDetails($applicantID);";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $ApplicantFirstName = $row["FirstName"];
    $ApplicantLastName = $row["LastName"];
    $ApplicantEmail = $row["Email"];

    $conn->close();
    //Load listing info
    $conn = Settings::SQLConnection();
    $query = "CALL sp_getListingInfo($listingId);";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $JobTitle = $row["Title"];

    $conn->close();

    //Create message contet
    $message = ApplicantEmailText($ApplicantFirstName, $ApplicantLastName, $JobTitle, $UniqueID);

    //Send email
    $MailHeaders =
    $MailHeaders  = "From: NoReply@Nebula.net.au\r\n";
    $MailHeaders .= "MIME-Version: 1.0\r\n";
    $MailHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($ApplicantEmail,"Nebula Job Application", $message, $MailHeaders);
}

function ApplicantEmailText($firstname, $surname, $JobTitle, $UniqueId) {
    $message = "";
    $message .= "<div style=\"width:100%; height:100%; background-color:#0E2336;\">"
    ."<p style=\"color:#DD9DAD;font-size: 50px;padding:20px;\">Hello ".$firstname." ".$surname.", </p><br>"
    ."<p style=\"color:#DD9DAD;font-size: 50px;padding:20px;\"> Thank you applying for the ".$JobTitle." Position</p>"
    ."<p style=\"color:#DD9DAD;font-size: 50px;padding:20px;\">Please click this <a style=\"color: #FFDB71;\" class=\"theme-dark link\" href=\"https://mercury.swin.edu.au/cos10026/s103603101/test/application_confirm.php?token=$UniqueId\">link</a> to confirm your application</p>"
    ."<p style=\"color:#DD9DAD;font-size: 50px;padding:20px;\"> Feel free to keep applying <a style=\"color: #FFDB71;\" class=\"theme-dark link\" href=\"https://mercury.swin.edu.au/cos10026/s103603101/test/jobs.php\">here</a></p>"
    ."<div style=\"width:100%; height:100%; background-color:#F3F1DC;\">"
    ."<p style=\"color:#4A2044;font-size: 50px;\" >Copyright &#169; 2024 NEBULA</p>"
    ."</div>"
    ."</div>";
    return $message;
}

?>