DROP PROCEDURE IF EXISTS sp_getApplicationsForApplicant;
DELIMITER //
CREATE PROCEDURE sp_getApplicationsForApplicant(
    IN Applicant INT,
    IN reference varchar(5)
)
BEGIN
    SELECT ja.Id,Status, ApplicationDate, JobListingId
    FROM JobApplications ja 
    INNER JOIN JobListing jl on ja.JobListingId = jl.Id
	WHERE ApplicantId = Applicant
    AND (reference = '' 
    OR jl.Reference = reference);
END //
DELIMITER ;