DROP PROCEDURE IF EXISTS sp_deleteApplicationsForReference;
DELIMITER //
CREATE PROCEDURE sp_deleteApplicationsForReference(
    IN reference varchar(5)
)
BEGIN
    DELETE FROM JobApplications
    WHERE JobListingId IN (SELECT ListingId from JobListings WHERE Reference = reference);
END //
DELIMITER ;