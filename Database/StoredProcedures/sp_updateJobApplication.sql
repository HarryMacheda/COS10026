DROP PROCEDURE IF EXISTS sp_updateJobApplication;
DELIMITER //
CREATE PROCEDURE sp_updateJobApplication(
    IN ApplicantionId INT (4),
    IN UniqueId varchar(100),
    IN status INT
)
BEGIN
    UPDATE JobApplications
    SET Status = status
    WHERE Id = ApplicantionId or UniqueSession = UniqueId;
END //
DELIMITER ;