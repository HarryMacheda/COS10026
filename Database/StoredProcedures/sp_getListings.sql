DELIMITER //

CREATE PROCEDURE sp_JobListings()
BEGIN
    SELECT * FROM JobListing;
END //

DELIMITER ;