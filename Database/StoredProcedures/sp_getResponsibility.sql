DROP PROCEDURE IF EXISTS sp_getResponsibility;
DELIMITER //
CREATE PROCEDURE sp_getResponsibility(
    IN ResponsibilityId INT
)
BEGIN
    SELECT Name FROM JobResponsibilities
    WHERE Id = ResponsibilityId;
END //
DELIMITER ;