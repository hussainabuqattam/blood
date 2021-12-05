<?php
  $title = "Home Page";
$footer = true;
include("include/header.php");?>
<?php include("include/top-nav.php")?>

  
     

    <!-- Header -->
    <header id="page-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text index" >
                        <span class="name"><i class="fab fa-gratipay"style="color:#ff0018"></i>&nbsp;Blood Bank</span>
                        <span class="skills">Donate and save a patient's life</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>    
        </div>
    </header>

    <!--about-->
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 style="font-size:40px;margin-top:50px;"id="About Us">about us</h2>
            <hr class="star-primary">
        </div>
    </div>
    <div class="about-conatainer">
        <div class="row">
            <div class="col-6">
                <div class="container-text-about">
                    <h1><i class="fab fa-gratipay"></i>&nbsp;Blood Bank</h1>
                    <p>Blood banking is the process that takes place in the lab to make sure that donated blood, or blood products, are safe before they are used in blood transfusions and other medical procedures. Blood banking includes typing the blood for transfusion and testing for infectious diseases.</p>
                </div>
            </div>
            <div class="col-6">
                <div class="container-img">
                    <img src="img/pexels-karolina-grabowska-5206978.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
   <!--about-->

   <!--event-->
   <div class="row">
        <div class="col-lg-12 text-center">
            <h2 style="font-size:40px;margin-top:50px;"id="Event">Event</h2>
            <hr class="star-primary">
        </div>
    </div>
   <main class="page-content">
  <div class="card-event" style="background-image: url(img/pexels-icsa-1708936.jpg);">
    <div class="content-event">
      <h2 class="title">blood Event</h2>
      <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the mountains</p>
      <button class="btn-event">Read Now</button>
    </div>
  </div>
  <div class="card-event" style="background-image: url(img/pexels-karolina-grabowska-4047146.jpg);">
    <div class="content-event">
      <h2 class="title">blood Event</h2>
      <p class="copy">Plan your next beach trip with these fabulous destinations</p>
      <button class="btn-event">Read Now</button>
    </div>
  </div>
  <div class="card-event" style="background-image: url(img/pexels-karolina-grabowska-5206978.jpg);">
    <div class="content-event">
      <h2 class="title">blood Event</h2>
      <p class="copy">It's the desert you've always dreamed of</p>
      <button class="btn-event">Read Now</button>
    </div>
  </div>
  <div class="card-event" style="background-image: url(img/pexels-karolina-grabowska-4226923.jpg);">
    <div class="content-event">
      <h2 class="title">blood Event</h2>
      <p class="copy">Seriously, straight up, just blast off into outer space today</p>
      <button class="btn-event">Read Now</button>
    </div>
  </div>
</main>

   <!--event-->
   <!--contact-->
   <div class="row">
        <div class="col-lg-12 text-center">
            <h2 style="font-size:40px;margin-top:100px;"id="contacts">Contact Us</h2>
            <hr class="star-primary">
        </div>
    </div>
  <form class="contact-about" action="" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
     <!--contact-->



<?php include("include/footer.php"); ?>