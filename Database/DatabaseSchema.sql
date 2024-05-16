-- Database Schema - Used to create tables --
-- WARNING!!!! This script remakes the tables 
-- it will delete all data currently in the tables
--          USE AT YOUR OWN RISK           --

-- Job listing table
DROP TABLE IF EXISTS JobListingSkills;
DROP TABLE IF EXISTS JobSkills;
DROP TABLE IF EXISTS JobListingResponsibilities;
DROP TABLE IF EXISTS JobResponsibilities;
DROP TABLE IF EXISTS JobListing;
CREATE TABLE IF NOT EXISTS JobListing
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Reference VARCHAR(5) NOT NULL,
    Title VARCHAR(100) NOT NULL,
    Description VARCHAR(1000),
    SalaryLow INT,
    SalaryHigh INT
);

-- Responsibilities for potential job listings
CREATE TABLE IF NOT EXISTS JobResponsibilities
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(1000) NOT NULL
);

-- Link between the cob listing and its responsibilities
CREATE TABLE IF NOT EXISTS JobListingResponsibilities
(
    ListingId INT NOT NULL,
    ResponsibilityId INT NOT NULL,
    ListOrder INT NULL,
    PRIMARY KEY (ListingId, ResponsibilityId),
    CONSTRAINT FK_Listing_JobListingResponsibilities FOREIGN KEY (ListingId) REFERENCES JobListing(Id),
    CONSTRAINT FK_Responsibility_JobListingResponsibilities FOREIGN KEY (ResponsibilityID) REFERENCES JobResponsibilities(Id)
);

-- Skills for potential jobs (no distinction between essential or non skills)
CREATE TABLE IF NOT EXISTS JobSkills 
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(1000) NOT NULL
);

-- Link between jobs and the skills distinguishes between essential or not based on a bit value
CREATE TABLE IF NOT EXISTS JobListingSkills 
(
    ListingId INT NOT NULL,
    SkillId INT NOT NULL,
    IsEssential BIT NULL,
    ListOrder INT NULL,
    PRIMARY KEY (ListingId, SkillId),
    CONSTRAINT FK_Listing_JobListingSkills FOREIGN KEY (ListingId) REFERENCES JobListing(Id),
    CONSTRAINT FK_Skill_JobListingSkills FOREIGN KEY (SkillId) REFERENCES JobSkills(Id)
);

-- Applicants table
CREATE TABLE IF NOT EXISTS Applicants
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    DOB DATE NOT NULL,
    Gender VARCHAR(100),
    Address VARCHAR(100),
    Suburb VARCHAR(100),
    State VARCHAR(100),
    Postcode VARCHAR(100),
    Email VARCHAR(100),
    Phone VARCHAR(100),
    OtherSkills VARCHAR(5000)
);

-- Job Applications table
CREATE TABLE IF NOT EXISTS JobApplications
(
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UniqueSession VARCHAR(100) NOT NULL
    Status INT NOT NULL,
    JobListingId INT NOT NULL,
    ApplicantId INT NOT NULL,
    ApplicationDate DATETIME,
    FOREIGN KEY (JobListingId) REFERENCES JobListing(Id),
    FOREIGN KEY (ApplicantId) REFERENCES Applicants(Id)
);

-- Applicant Skills table
CREATE TABLE IF NOT EXISTS ApplicantSkills
(
    ApplicantId INT NOT NULL,
    SkillId INT NOT NULL,
    PRIMARY KEY (ApplicantId, SkillId),
    FOREIGN KEY (ApplicantId) REFERENCES Applicants(Id),
    FOREIGN KEY (SkillId) REFERENCES JobSkills(Id)
);
