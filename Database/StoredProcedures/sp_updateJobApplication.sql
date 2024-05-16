DROP PROCEDURE IF EXISTS sp_updateJobApplication;
DELIMITER //
CREATE PROCEDURE sp_updateJobApplication(
    IN listingid INT (4)
    IN status ENNUM
)
BEGIN
    UPDATE JobListings
    SET Status = status
    WHERE JobListingID = listingid;
END //
DELIMITER ;