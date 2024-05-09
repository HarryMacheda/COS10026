DROP PROCEDURE IF EXISTS sp_getApplicationsForLIsting;
DELIMITER //
CREATE PROCEDURE sp_getApplicationsForLIsting()
BEGIN
    SELECT Id, name FROM JobSkills;
END //
DELIMITER ;