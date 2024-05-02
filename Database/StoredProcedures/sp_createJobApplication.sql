DROP PROCEDURE IF EXISTS sp_createJobApplication;
DELIMITER //
CREATE PROCEDURE sp_createJobApplication (
    IN Status INT,
    IN ListingId INT,
    IN ApplicantId INT,
    IN Created DATETIME
)
BEGIN
    INSERT INTO JobApplications 
    (Status, ListingId, ApplicantId, ApplicationDate)
    VALUES
    (Status, ListingId, ApplicantId, ApplicationDate);
END //
DELIMITER ;