DROP PROCEDURE IF EXISTS sp_getApplicantDetails;
DELIMITER //
CREATE PROCEDURE sp_getApplicantDetails(
    IN ApplicantId INT
)
BEGIN
    SELECT FirstName,LastName, Email FROM Applicants
    WHERE Id = ApplicantId;
END //
DELIMITER ;