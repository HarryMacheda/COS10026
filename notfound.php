<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="description" content="Available jobs page for Nebula">
      <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
      <meta name="author" content="Tristan Thorp">
      <title>404 Not Found</title>
      <link rel="icon" type="image/x-icon" href="./tiny_logo.png">
      <link rel="stylesheet" href="./styles/style.css" />
      <link rel="stylesheet" href="./styles/all.css" />
      <meta name="theme-color" content="#F3F1DC"/> <!-- set the theme colour so mobile browsers set the background colour -->
      <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- set the viewport so we know the browsers width for mobile layouts -->
    </head>
    <body>
      <nav>
        <!-- Nav bar
            Each page has its own span
            Inside the span is another span with a font awesome icon
            This span is set to aria-hidden so it is ignored by screen readers
            We want to hide this as otherwise it will read both icon and link which is redundent
            Then we have a href with a link to the relevant page
        -->
         <?php include 'nav.inc';?>
        </nav>
        <main>
            <div id="notFoundConatiner">
                <div class="glasspane">
                    <section id="notFoundTextContainer">
                        <h1>Oops!</h1>
                        <h2>Error 404 - Page could not be found</h2>
                        <p>
                            Looks like the stars have gone out!<br>
                            We could use new developers to keep our website running <br>
                            Come apply <a class="theme-dark link" href="apply.html">Here!</a>
                        </p>
                    </section>
                </div>
            </div>
        </main>
    </body>
</html>