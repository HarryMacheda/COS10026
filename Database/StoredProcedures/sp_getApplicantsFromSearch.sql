DROP PROCEDURE IF EXISTS sp_getApplicantsFromSearch;
DELIMITER //
CREATE PROCEDURE sp_getApplicantsFromSearch(
    IN Applicant INT,
    IN Search varchar(100),
    In reference varchar(5)
)
BEGIN
    SELECT DISTINCT A.Id, FirstName, LastName 
    FROM Applicants A
    LEFT OUTER JOIN JobApplications JA ON JA.ApplicantId = A.Id AND JA.Status > 0 
    LEFT OUTER JOIN JobListing Jl ON Jl.Id = JA.JobListingId
    WHERE JA.JobListingId IS NOT NULL
    AND ( A.Id = Applicant
    OR (Applicant = 0 AND
            (A.FirstName like CONCAT('%', Search, '%')
            OR A.LastName like CONCAT('%', Search, '%')
            OR A.FirstName + A.LastName like CONCAT('%', Search, '%')
            )
        )
    )
    AND (reference = '' 
    OR Jl.Reference = reference)
    ORDER BY LastName,FirstName;
END //
DELIMITER ;