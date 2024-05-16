DROP PROCEDURE IF EXISTS sp_createApplicant;
DELIMITER //
CREATE PROCEDURE sp_createApplicant(
    IN FirstName VARCHAR(100),
    IN LastName VARCHAR(100),
    IN DOB DATE,
    IN Gender VARCHAR(100),
    IN Address VARCHAR(100),
    IN Suburb VARCHAR(100),
    IN State VARCHAR(100),
    IN Postcode VARCHAR(100),
    IN Email VARCHAR(100),
    IN Phone VARCHAR(100),
    IN OtherSkills VARCHAR(5000),
    OUT ApplicantId INT
)
BEGIN
    SELECT Min(Id) INTO ApplicantId 
    FROM Applicants a
    WHERE a.Email = Email OR a.Phone = Phone;

    IF ApplicantId IS NOT NULL THEN
            -- Applicant Already exists
            -- TODO: Update existing details
            SELECT ApplicantId;
    ELSE
    	BEGIN
            -- Applicant doesn't exist, create them.
            INSERT INTO Applicants 
            (FirstName, LastName, DOB, Gender, Address, Suburb, State, Postcode, Email, Phone, OtherSkills)
            VALUES (
                FirstName,
                LastName,
                DOB,
                Gender,
                Address,
                Suburb,
                State,
                Postcode,
                Email,
                Phone,
                OtherSkills
            );
            SELECT MAX(Id) INTO ApplicantId FROM Applicants;
            SELECT ApplicantId;
    	END;
    END IF;
END //
DELIMITER ;