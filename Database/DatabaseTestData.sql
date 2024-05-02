-- Populates the database with test data --
-- WARNING THIS ASSUMES THAT THE SCHEMA IS ALREADY CREATED
-- The data base schema is set in the ./DatabasSchema.sql file

--          INSERT JOB LISTINGS             --

SET @ListingID = NULL;
SET @ResponsibilityID = NULL;
SET @SkillID = NULL;

-- Lead Developer
    -- Job Listing
        INSERT INTO JobListing
        (Reference, Title, Description, SalaryLow, SalaryHigh)
        VALUES
        ('LEDEV',
        'Lead Developer',
        'Nebula is hiring an experienced and motivated lead developer to manage a newly established team. You will be working closely with experienced software developers in a hybrid setting. The role comes with great potential for growth as new teams and projects are added.',
        128000,
        165000);
        SELECT @ListingID := MAX(Id) FROM JobListing;

    -- Responsibilities
        -- Responsibility 1
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Oversee experienced team of software developers on new projects');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,1);

        -- Responsibility 2
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Generate weekly sprint reports for Head of Software development');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,2);

        -- Responsibility 3
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Lead morning stand-ups to monitor team progress');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,3);

    -- Skills
        -- Essential
            -- Skill 1
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Demonstrated management skills (10 years)');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,1);

            -- Skill 2
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Strong experience in C#, .Net, and project management');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,2);

            -- Skill 3
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Microsoft platforms experience');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,3);
        -- Preferable
            -- Skill 1
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Qualification in software engineering or similar');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,0,1);

            -- Skill 2
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Experience managing remote teams');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,0,2);

            -- Skill 3
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Knowledge of Agile development');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId,SkillId,IsEssential,ListOrder)
            VALUES
            (@ListingID, @SkillID,0,3);
-- Front End Web Developer
    -- Job Listing
        INSERT INTO JobListing
        (Reference, Title, Description, SalaryLow, SalaryHigh)
        VALUES
        ('WBDEV',
        'Front End Web Developer',
        'Nebula is seeking an established web developer to immediately leap into creating exciting websites for our existing client base. Your experience and enthusiasm will take you a long way in fitting in with our existing team and producing outstanding work.',
        70000,
        100000);
        SELECT @ListingID := MAX(Id) FROM JobListing;

    -- Responsibilities
        -- Responsibility 1
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Design and development of webpages');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,1);

        -- Responsibility 2
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Manage CSS based on provided style guides');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId,ResponsibilityId,ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,2);

        -- Responsibility 3
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Basic scripting of pages');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,3);

    -- Skills
        -- Essential
            -- Skill 1
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Working knowledge of HTML5, CSS, Javascript, python');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId,SkillId,IsEssential,ListOrder)
            VALUES
            (@ListingID, @SkillID,1,1);

            -- Skill 2
            INSERT INTO JobSkills 
            (Name)
            VALUES ('University degree or equivalent');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId,SkillId,IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,2);

            -- Skill 3
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Proven development experience (2+ years)');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,3);
        -- Preferable
            -- Skill 1
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Working knowledge of collaboration tools');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId,SkillId,IsEssential,ListOrder)
            VALUES
            (@ListingID, @SkillID,0,1);

            -- Skill 2
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Experience working with a wide client base');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId,SkillId,IsEssential,ListOrder)
            VALUES
            (@ListingID, @SkillID,0,2);

            -- Skill 3
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Knowledge of Agile development');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,0,3);

-- Junior HR representative
    -- Job Listing
        INSERT INTO JobListing
        (Reference, Title, Description, SalaryLow, SalaryHigh)
        VALUES
        ('HRREP',
        'Junior HR representative',
        'Nebula is looking for a newly graduated human resources professional looking for a start in the industry. You’ll work closely with our existing HR team and developers as we go through a major growth phase. You’ll be responsible for organising interviews with shortlisted applicants, writing copy, and onboarding new hires. An ideal role for an outgoing and bubbly personality.',
        52000,
        57000);
        SELECT @ListingID := MAX(Id) FROM JobListing;

    -- Responsibilities
        -- Responsibility 1
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Answering and making calls');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,1);

        -- Responsibility 2
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('Filing payroll');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,2);

        -- Responsibility 3
        INSERT INTO JobResponsibilities 
        (Name)
        VALUES ('First point of employee contact');
        SELECT @ResponsibilityID := MAX(Id) FROM JobResponsibilities;

        INSERT INTO JobListingResponsibilities 
        (ListingId, ResponsibilityId, ListOrder)
        VALUES
        (@ListingID, @ResponsibilityID,3);

    -- Skills
        -- Essential
            -- Skill 1
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Qualification in Human Resources (New graduate)');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId,SkillId,IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,1);

            -- Skill 2
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Experience with Microsoft office suite');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId,  IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,2);

            -- Skill 3
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Willingness to learn and take direction');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,1,3);
        -- Preferable
            -- Skill 1
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Customer service experience');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,0,1);

            -- Skill 2
            INSERT INTO JobSkills 
            (Name)
            VALUES ('First aid certification');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,0,2);

            -- Skill 3
            INSERT INTO JobSkills 
            (Name)
            VALUES ('Coding experience or familiarity with IT work');
            SELECT @SkillID := MAX(Id) FROM JobSkills;

            INSERT INTO JobListingSkills 
            (ListingId, SkillId, IsEssential, ListOrder)
            VALUES
            (@ListingID, @SkillID,0,3);