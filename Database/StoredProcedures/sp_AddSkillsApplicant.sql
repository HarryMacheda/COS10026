DROP PROCEDURE IF EXISTS sp_AddSkillsApplicant;
DELIMITER //
CREATE PROCEDURE sp_AddSkillsApplicant (
    IN ApplicantId INT,
    IN SkillId INT
)
BEGIN
    IF NOT EXISTS (SELECT * FROM ApplicantSkills aps WHERE aps.ApplicantId = ApplicantId AND aps.SkillId = SkillId)
    THEN 
        INSERT INTO ApplicantSkills
        (ApplicantId, SkillId)
        VALUES
        (ApplicantId, SkillId); 
    END IF;
END //
DELIMITER ;