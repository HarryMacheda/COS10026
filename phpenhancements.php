<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Website enhancements for this website">
        <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
        <meta name="author" content="Harry Macheda">
        <title>PHP Enhancements</title>
        <link rel="icon" type="image/x-icon" href="./images/tiny_logo.png">
        <link rel="stylesheet" href="./styles/style.css" >
        <link rel="stylesheet" href="./styles/all.css" >
        <meta name="theme-color" content="#F3F1DC"> <!-- set the theme colour so mobile browsers set the background colour -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- set the viewport so we know the browsers width for mobile layouts -->
    </head>
    <body>
        <?php include 'nav.inc';?>
        <main id="enhanceMain">
            <h1 id="enhancePageHeading" class="theme-dark heading">Website Enhancements</h1>
            <div id="enhancementsContainers">
                <div id="enahnceLoadJobApplications" class="glasspane">
                    <h2 class="theme-light heading">Dynamic Jobs Page Loading</h2>
                    <p>
                        In part 2 of the assignment we rewrote the jobs page (which displays a list of jobs
                        which can be applied to) so that it will load the job applications from the database.
                        <br>
                        <h3 class="theme-light heading">Normalising the database</h3>
                        The first step in loading the pages from the database was to normalise the schema, 
                        by creating tables to split where the data of the job listing is stored.
                        <br><br>
                        <span>Job Listings:  Stores the information about the job listing, ie reference, title, salary, ect</span>
                        <br><br>
                        <span>Job Skills:  Stores skills a job could have both essential and recommended.</span>
                        <br><br>
                        <span>Job Listing Skills:  Stores the link between a job listing and its skills.</span> 
                        <br><br>   
                        <span>Job Resposibilities:  Stores the resposibilities a job could have.</span>    
                        <br><br>
                        <span>Job Listing Resposibilities:  Stores the link between a job listing and its responsibilities</span>    
                        <br><br>
                        Having the database be normalised allows us to store a variable amount of skills and 
                        resposibilities for each job rather than limiting to a fixed number.
                        <br>
                        <h3 class="theme-light heading">Loading from the database</h3>
                        Loading the data from the database takes place in few steps, it is done 
                        in a very dynamic way to ensure we are not limited to a certain number of 
                        job listings.<br>
                        The steps to load the page are:
                        <ol>
                            <li>Get a list of all the job listings and thier associated info.</li>
                            <li>For each Job listing:
                                <ul>
                                    <li>Get its associated responsibilities.</li>
                                    <li>Load the data for each responsibility.</li>
                                    <li>Get its associated skills.</li>
                                    <li>Sort each into essential and recomended</li>
                                    <li>Load the data for each skill.</li>
                                </ul>
                            </li>
                            <li>We then render the page by:
                                <ol>
                                    <li>Showing the job listings info</li>
                                    <li>Looping through each resposibility and adding it to a list.</li>
                                    <li>Looping through each skill and adding it to a list, 
                                        choosing the list depending on if its essential or not.
                                    </li>
                                </ol>
                            </li>
                        </ol>
                        <br>
                        To see this in action go to the page <a class="theme-dark link" href="./jobs.php">here!</a>
                    </p>
                </div>

                <div id="enahnceEmailConfirmation" class="glasspane">
                    <h2 class="theme-light heading">Email Confirmation Process</h2>
                    <p>
                        Part 2 of the assignment revolves around security, because of this we 
                        decided having a way to verify the identity of applicants would be vital
                        to ensure the validity of the applications sent in.
                        <br>
                        To do this we added the email confirmation process, which is as follows:
                        <ul>
                            <li>
                                When a user sends the application its uses the email they provide 
                                to send them a confirmation email.
                            </li>
                            <li>
                                At this point the users application is in the "Pending confirmation" state,
                                which signals to managers that it is "untrusted".
                            </li>
                            <li>
                                The confirmation email contains a link to our website, clicking on the 
                                link will move the application to the confirmed state.
                            </li>
                        </ul>
                        The confirmation is handled by a Unique Id (php uuid) attached to each application.
                        This is used rather than the databases identity column as since it is sudo random 
                        it is not able to be guessed based on prevoiusly submitted applications. This prevents 
                        users from changing the link after using an invalid email by adding 1 onto thier previous email.
                        <br>
                        <br>
                        To get one of our beautiful emails go <a class="theme-dark link" href="./apply.php?ref=WBDEV">here</a> and enter your email.
                    </p>
                </div>
            </div>
        </main>        
             <?php include 'background.inc';?>
             
        <footer>
            <?php include 'footer.inc';?>
        </footer>
    </body>
</html>