DROP PROCEDURE IF EXISTS sp_getApplicants;
DELIMITER //
CREATE PROCEDURE sp_getApplicants(
    IN hasValidApplication bit
)
BEGIN
    SELECT DISTINCT A.Id, FirstName, LastName FROM Applicants A
    LEFT OUTER JOIN JobApplications JA ON JA.ApplicantId = A.Id AND JA.Status > 0
    WHERE hasValidApplication = 1 or JA.JobListingId IS NOT NULL
    ORDER BY LastName,FirstName;
END //
DELIMITER ; 