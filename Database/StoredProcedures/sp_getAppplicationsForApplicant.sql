DROP PROCEDURE IF EXISTS sp_getAppplicationsForApplicant;
DELIMITER //
CREATE PROCEDURE sp_getAppplicationsForApplicant()
BEGIN
    SELECT Id, name FROM JobSkills;
END //
DELIMITER ;