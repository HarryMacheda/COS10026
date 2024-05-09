DROP PROCEDURE IF EXISTS sp_getApplicationsForApplicant;
DELIMITER //
CREATE PROCEDURE sp_getApplicationsForApplicant(
    IN firstName VARCHAR(30),
    IN lastName VARCHAR(30)
)
BEGIN
    SELECT DESTINCT JobApplications.JobListingId 
    FROM JobApplications
    JOIN Applicants ON JobApplications.ApplicantID = Applicants.ApplicantID
    WHERE Applicants.FirstName = firstName OR ApplicantsLastName = lastName;
END //
DELIMITER ;

