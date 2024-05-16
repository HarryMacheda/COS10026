DROP PROCEDURE IF EXISTS sp_createJobApplication;
DELIMITER //
CREATE PROCEDURE sp_createJobApplication (
    IN Status INT,
    IN UniqueId varchar(100),
    IN ListingId INT,
    IN ApplicantId INT,
    IN Created DATETIME
)
BEGIN
    INSERT INTO JobApplications 
    (Status, UniqueSession, JobListingId, ApplicantId, ApplicationDate)
    VALUES
    (Status, UniqueId, ListingId, ApplicantId, Created);
END //
DELIMITER ;