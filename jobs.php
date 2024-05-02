<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Car Form</title>

<meta charset="utf-8" />
<meta name="description" content="Lab 10"  />
<meta name="keywords" content="PHP, File, input, output" />
<link rel="stylesheet" href="addcar.css" type="text/css" />

</head>
<body>
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
</body>
</html>