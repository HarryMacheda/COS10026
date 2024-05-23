DROP PROCEDURE IF EXISTS sp_deleteApplicationsForReference;
DELIMITER //
CREATE PROCEDURE sp_deleteApplicationsForReference(
    IN reference varchar(5)
)
BEGIN
    DELETE ja
    FROM JobApplications ja
    inner join JobListing jl on ja.JobListingId = jl.Id
    WHERE jl.Reference = reference;
END //
DELIMITER ;