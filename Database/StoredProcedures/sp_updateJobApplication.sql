DROP PROCEDURE IF EXISTS sp_updateJobApplication;
DELIMITER //
CREATE PROCEDURE sp_updateJobApplication(
    IN listingid INT (4),
    IN UniqueId varchar(100),
    IN status INT
)
BEGIN
    UPDATE JobApplications
    SET Status = status
    WHERE JobListingID = listingid or UniqueSession = UniqueId;
END //
DELIMITER ;