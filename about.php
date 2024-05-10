<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="description" content="Group information" >
    <meta name="keywords" content="Tech Company, Nebula, Space, Jobs, Software">
    <meta name="author" content="Harry Macheda">
    <title>About Us</title>
    <link rel="icon" type="image/x-icon" href="./tiny_logo.png" >
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
            <?php include 'nav.inc';?>
      </nav>
      <main>
            <h1 class="theme-light heading" id="aboutUsHeading">About Us</h1>
                <div class="glasspane aboutUsBox">
                    <section id="aboutUsInfo">
                      <h2 class="theme-light heading" id="aboutUsBody">Group Information</h2>
                      <dl class="aboutUsDefinitonList">
                          
                          <dt class="theme-light heading">Group Name</dt>
                          <dd class="theme-light paragraph">NEBULA</dd>
                          <dt class="theme-light heading">Tutor</dt>
                          <dd class="theme-light paragraph">Razeen Hashmi</dd>
                          <dt class="theme-light heading">Course</dt>
                          <dd class="theme-light paragraph">COS10026</dd>
                      </dl>
                  </section>
                  <section id="aboutUsPhoto">
                      <h2 class="theme-light heading" id="groupPhotoHeading">Group Photo</h2>
                      <img src="./images/groupphoto.png" id="groupPhoto" alt="Photo of the group members" >
                  </section>
                <section id="aboutUsTimeTable">
                <h2 class="theme-light heading">Timetable</h2>
                  <table id="aboutTtimetable" class="theme-dark table">
                      <tr>
                          <th>Time</th>
                          <th>Monday</th>
                          <th>Tuesday</th>
                          <th>Wednesday</th>
                          <th>Thursday</th>
                          <th>Friday</th>
                      </tr>
                      <tr><td>8:00AM</td><td></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>8:30AM</td><td class="class-cos40003">Online Lecture</td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>9:00AM</td><td class="class-cos40003"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>9:30AM</td><td class="class-cos40003"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>10:00AM</td><td class="class-cos40003"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>10:30AM</td><td></td><td></td><td></td><td class="class-cos30008">Workshop</td><td></td></tr>
                      <tr><td>11:00AM</td><td></td><td></td><td></td><td class="class-cos30008"></td><td></td></tr>
                      <tr><td>11:30AM</td><td></td><td></td><td></td><td class="class-cos30008"></td><td></td></tr>
                      <tr><td>12:00AM</td><td></td><td></td><td></td><td class="class-cos30008"></td><td></td></tr>
                      <tr><td>12:30AM</td><td class="class-cos10026">Online Lecture</td><td></td><td></td><td class="class-cos30008">Online Lecture</td><td></td></tr>
                      <tr><td>1:00PM</td><td class="class-cos10026"></td><td></td><td></td><td class="class-cos30008"></td><td></td></tr>
                      <tr><td>1:30PM</td><td></td><td></td><td></td><td class="class-cos10026">Faciliator Meeting</td><td></td></tr>
                      <tr><td>2:00PM</td><td></td><td></td><td></td><td class="class-cos10026"></td><td></td></tr>
                      <tr><td>2:30PM</td><td></td><td></td><td></td><td class="class-cos10026">Workshop</td><td></td></tr>
                      <tr><td>3:00PM</td><td></td><td></td><td></td><td class="class-cos10026"></td><td></td></tr>
                      <tr><td>3:30PM</td><td class="class-cos40003">Tutorial</td><td class="class-eee20006">Tutorial</td><td></td><td class="class-cos10026"></td><td></td></tr>
                      <tr><td>4:00PM</td><td class="class-cos40003"></td><td class="class-eee20006"></td><td></td><td class="class-cos10026"></td><td></td></tr>
                      <tr><td>4:30PM</td><td></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>5:00PM</td><td></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>5:30PM</td><td></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>6:00PM</td><td></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>6:30PM</td><td class="class-eee20006">Lecture</td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>7:00PM</td><td class="class-eee20006"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>7:30PM</td><td class="class-eee20006"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>8:00PM</td><td class="class-eee20006"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>8:30PM</td><td class="class-eee20006"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>9:00PM</td><td class="class-eee20006"></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>9:30PM</td><td></td><td></td><td></td><td></td><td></td></tr>
                  </table>
                </section>              
              <h2 class="theme-light heading">Group Profile</h2>
              <p>
                NEBULA is made up of Harry, Nikki, Gabriel, and late addition
                of Tristan who joined after a class cancellation. We have taken to
                working together well with the establishment of a github to manage
                website version control.
              </p>
              <br>
              <br>
              <br>
              <h3>Harry Macheda</h3>
                  <p>
                      Harry is 21 years old and completing a Bachelor of Engineering majoring in software,
                      he works as a software developer at Loop Software. In his spare time harry looks after
                      his cat named Lucy, reads books, and roller skates.
                  </p>
                  <p >Skills</p>
                  <ul id="harry-skills">
                      <li>HTML</li>
                      <li>CSS</li>
                      <li>Javascript</li>
                      <li>C#</li>
                      <li>Sql</li>
                  </ul>
                  <br>
              <h3>Nikki Ingkaninun</h3>
              <p>
                I'm doing Computer Science major in AI and minor in Software
                Development. I'm into landscape film photography and music.
              </p>
              <h3>Tristan Thorp</h3>
              <p>
                I'm studying Computer Science with a double major in Software
                Developent and Cyber Security. I try to keep my timetable as slim as
                possible because I live in Gippsland so it takes me about 2 and a half
                hours to get to uni on any day I have classes. I like to spend my free
                time playing video games and painting miniatures.
              </p>
              <h3>Gabriel Stingas</h3>
              <p>
              I'm studying Computer Science and Applied Innovation, major to be determined.
              I spend most of my free time reading and playing video games.  
              </p>

              <a class="theme-dark link" href="mailto:103603101@student.swin.edu.au">Email us here</a>
            </div>
      </main>
    <span class="circle fa-solid fa-star" id="circle_0_0"></span
    ><span class="circle fa-solid fa-star" id="circle_0_1"></span
    ><span class="circle fa-solid fa-star" id="circle_0_2"></span
    ><span class="circle fa-solid fa-star" id="circle_0_3"></span
    ><span class="circle fa-solid fa-star" id="circle_1_0"></span
    ><span class="circle fa-solid fa-star" id="circle_1_1"></span
    ><span class="circle fa-solid fa-star" id="circle_1_2"></span
    ><span class="circle fa-solid fa-star" id="circle_1_3"></span
    ><span class="circle fa-solid fa-star" id="circle_1_4"></span
    ><span class="circle fa-solid fa-star" id="circle_2_0"></span
    ><span class="circle fa-solid fa-star" id="circle_2_1"></span
    ><span class="circle fa-solid fa-star" id="circle_2_2"></span
    ><span class="circle fa-solid fa-star" id="circle_2_3"></span
    ><span class="circle fa-solid fa-star" id="circle_3_0"></span
    ><span class="circle fa-solid fa-star" id="circle_3_1"></span
    ><span class="circle fa-solid fa-star" id="circle_3_2"></span
    ><span class="circle fa-solid fa-star" id="circle_4_0"></span
    ><span class="circle fa-solid fa-star" id="circle_4_1"></span
    ><span class="circle fa-solid fa-star" id="circle_4_2"></span
    ><span class="circle fa-solid fa-star" id="circle_4_3"></span
    ><span class="circle fa-solid fa-star" id="circle_5_0"></span
    ><span class="circle fa-solid fa-star" id="circle_5_1"></span
    ><span class="circle fa-solid fa-star" id="circle_5_2"></span
    ><span class="circle fa-solid fa-star" id="circle_5_3"></span
    ><span class="circle fa-solid fa-star" id="circle_6_0"></span
    ><span class="circle fa-solid fa-star" id="circle_6_1"></span
    ><span class="circle fa-solid fa-star" id="circle_6_2"></span
    ><span class="circle fa-solid fa-star" id="circle_7_0"></span
    ><span class="circle fa-solid fa-star" id="circle_7_1"></span
    ><span class="circle fa-solid fa-star" id="circle_7_2"></span
    ><span class="circle fa-solid fa-star" id="circle_7_3"></span
    ><span class="circle fa-solid fa-star" id="circle_8_0"></span
    ><span class="circle fa-solid fa-star" id="circle_8_1"></span
    ><span class="circle fa-solid fa-star" id="circle_8_2"></span
    ><span class="circle fa-solid fa-star" id="circle_8_3"></span
    ><span class="circle fa-solid fa-star" id="circle_8_4"></span
    ><span class="circle fa-solid fa-star" id="circle_9_0"></span
    ><span class="circle fa-solid fa-star" id="circle_9_1"></span
    ><span class="circle fa-solid fa-star" id="circle_9_2"></span
    ><span class="circle fa-solid fa-star" id="circle_9_3"></span
    ><span class="circle fa-solid fa-star" id="circle_9_4"></span
    ><span class="circle fa-solid fa-star" id="circle_10_0"></span
    ><span class="circle fa-solid fa-star" id="circle_10_1"></span
    ><span class="circle fa-solid fa-star" id="circle_10_2"></span
    ><span class="circle fa-solid fa-star" id="circle_11_0"></span
    ><span class="circle fa-solid fa-star" id="circle_11_1"></span
    ><span class="circle fa-solid fa-star" id="circle_11_2"></span
    ><span class="circle fa-solid fa-star" id="circle_12_0"></span
    ><span class="circle fa-solid fa-star" id="circle_12_1"></span
    ><span class="circle fa-solid fa-star" id="circle_12_2"></span
    ><span class="circle fa-solid fa-star" id="circle_13_0"></span
    ><span class="circle fa-solid fa-star" id="circle_13_1"></span
    ><span class="circle fa-solid fa-star" id="circle_13_2"></span
    ><span class="circle fa-solid fa-star" id="circle_13_3"></span
    ><span class="circle fa-solid fa-star" id="circle_14_0"></span
    ><span class="circle fa-solid fa-star" id="circle_14_1"></span
    ><span class="circle fa-solid fa-star" id="circle_14_2"></span>

    <footer>
      <?php include 'footer.inc';?>
    </footer>
  </body>
</html>
