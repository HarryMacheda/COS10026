DROP PROCEDURE IF EXISTS sp_getListingInfo;
DELIMITER //
CREATE PROCEDURE sp_getListingInfo(
    IN ListingID INT
    In sort nvarch
)
BEGIN
    SELECT Reference,Title,Description,SalaryLow,SalaryHigh FROM JobListing
    WHERE Id = ListingID;

    SELECT jr.Id 
    FROM JobListingResponsibilities jlr 
    INNER JOIN JobResponsibilities jr on jlr.ResponsibilityId = jr.Id
    WHERE jlr.ListingID = ListingID
    ORDER BY jlr.ListOrder;

    SELECT jls.SkillId, jls.IsEssential
    FROM JobListingSkills jls
    WHERE jls.ListingID = ListingID
    ORDER BY jls.IsEssential DESC, jlr.ListOrder;
    

END //
DELIMITER ;