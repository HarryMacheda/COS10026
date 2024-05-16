<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Landing page for the tech company Nebula">
    <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
    <meta name="author" content="Harry Macheda" >
    <title>NEBULA</title>
    <link rel="icon" type="image/x-icon" href="./images/tiny_logo.png">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/all.css">
    <meta name="theme-color" content="#F3F1DC">
    <!-- set the theme colour so mobile browsers set the background colour -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- set the viewport so we know the browsers width for mobile layouts -->
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
        <img src="./images/tiny_logo.png" alt="">
          <div id="navDesktop">
            <a href="./index.html"><span class="fa-solid fa-house" aria-hidden="true"></span>Home</a>
            <a href="./jobs.html"><span class="fa-solid fa-user-tie" aria-hidden="true"></span>Jobs</a>
            <a href="./apply.html"><span class="fa-solid fa-file-contract" aria-hidden="true"></span>Application</a>
            <a href="./about.html"><span class="fa-solid fa-people-group" aria-hidden="true"></span>About Us</a>
            <a href="./enhancements.html"><span class="fa-solid fa-star" aria-hidden="true"></span>Enhancements</a>
          </div>
          <div id="navMobile">
            <span class="fa-solid fa-bars" aria-hidden="true" onclick=""></span>
            <div>
              <a href="./index.html"><span class="fa-solid fa-house" aria-hidden="true"></span>Home</a>
              <a href="./jobs.html"><span class="fa-solid fa-user-tie" aria-hidden="true"></span>Jobs</a>
              <a href="./apply.html"><span class="fa-solid fa-file-contract" aria-hidden="true"></span>Application</a>
              <a href="./about.html"><span class="fa-solid fa-people-group" aria-hidden="true"></span>About Us</a>
              <a href="./enhancements.html"><span class="fa-solid fa-star" aria-hidden="true"></span>Enhancements</a>
            </div>
            </div>
      </nav>
    <main>
      <div class="logo">
        <img src="./images/main_logo.png" alt="Nebula Company Logo, a star surrounded by colourful rings above stylised text reading Nebula">
        <p class="theme-dark code">
          &lt;div class=&quot;logo&quot;&gt; <br>
            &lt;img src=&quot;./main_logo.png&quot; <br>
                    alt=&quot;Nebula Company Logo, a star surrounded by colourful rings above stylised text reading Nebula&quot; 
            /&gt;&lt;/div&gt;<br> 
            .logo p {<br>  
              top: 10%;<br>  
              left: 5%;<br> 
              width: 25%;<br>  
              height: 40%;<br>  
              position: absolute;<br>  
            }<br>  
            /*Desktop*/<br>  
              /*#region*/<br>  
            @media screen and (min-width: 600px) {<br> 
              .welcome-text {<br>  
                float: right;<br>  
                width: 50%;<br>  
                height: 300px;<br>  
                text-align: center;<br>  
                position: relative;<br>  
                right: 10%;<br>  
            }<br> 
        </p>
      </div>
      <div class="welcome-text">
        <h1>REINVENT WHAT YOUR NETWORK COULD BE</h1>
        <h1>REINVENT WHAT YOUR NETWORK COULD BE</h1>
        <h1>REINVENT WHAT YOUR NETWORK COULD BE</h1>
      </div>
      <div class="description">
        <h2>
          Despite there are hundreds of digital marketing companies, there are
          just a few individuals that are all-inclusive, highly responsive, and
          provide complete range traditional and digital marketing services that
          meet your time frame and meet your specifications. We have a
          Australia-based team of 15-25 members with offices in Melbourne,
          Sydney, and Perth.
        </h2>
      </div>
    </main>
    <?php include 'background';?>
    <footer>
    <?php include 'footer.inc';?>
    </footer>
  </body>
</html>
