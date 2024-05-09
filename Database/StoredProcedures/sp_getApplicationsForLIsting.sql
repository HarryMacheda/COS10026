DROP PROCEDURE IF EXISTS sp_getApplicationsForListing;
DELIMITER //
CREATE PROCEDURE sp_getApplicationsForListing()
BEGIN
    SELECT Id, name FROM JobSkills;
END //
DELIMITER ;