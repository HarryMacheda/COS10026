DROP PROCEDURE IF EXISTS sp_deleteApplicationsForListing;
DELIMITER //
CREATE PROCEDURE sp_deleteApplicationsForListing(
    IN listingid INT(4)
)
BEGIN
    DELETE FROM JobApplications
    WHERE JobListingId = listingid;
END //
DELIMITER ;