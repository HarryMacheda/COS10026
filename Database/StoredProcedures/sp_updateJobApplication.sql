DROP PROCEDURE IF EXISTS sp_updateJobApplication;
DELIMITER //
CREATE PROCEDURE sp_updateJobApplication()
BEGIN
    SELECT Id, name FROM JobSkills;
END //
DELIMITER ;