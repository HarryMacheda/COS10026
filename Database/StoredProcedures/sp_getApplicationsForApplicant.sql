DROP PROCEDURE IF EXISTS sp_getApplicationsForApplicant;
DELIMITER //
CREATE PROCEDURE sp_getApplicationsForApplicant(
    IN Applicant INT,
    IN reference varchar(5)
)
BEGIN
    SELECT Status, ApplicationDate, JobListingId
    FROM JobApplications
	WHERE ApplicantId = Applicant
    AND (reference = '' 
    OR JobListingId IN (SELECT Id from JobListing WHERE Reference = reference));
END //
DELIMITER ;