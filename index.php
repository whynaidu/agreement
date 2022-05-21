<?php
include("include/configure.inc.php");
if(isset($_POST["login"])){
	$name=$_POST["name"];
	$email=$_POST["email"];
  $mob_no=$_POST["mob_no"];
  $description=$_POST["description"];
  
  

	$sql = mysqli_query($conn,"INSERT INTO `enquiry`( `name`, `email`, `mob_no`, `description`) VALUES ('$name','$email','$mob_no','$description')") ;
  if($sql==1){
    echo "<script>alert('Thank You For Contacting Us. We Will Get Back To You Soon.'),window.location='#';</script>";
  
  }else{
    echo "<script>alert('something went wrong');</script>";
  }

  }
  

?> 
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />

    <!--====== Title ======-->
    <title>AGREERENT</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="assets/images/favicon.png"
      type="image/png"
    />

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/lineIcons.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- JavaScript Bundle with Popper -->
<style>
.forms{

    width: 100%;
    padding: 10px;
    margin-top: 20px;
    border: 1px solid #dee2e6;
    font-size: 16px;
    border-radius: 20px;
    
}

</style>
  </head>


  <body>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header"style="text-align:center;">
                        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;">Register For Demo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" >
                       
              <form method="post">
                  <input type="text" class="forms" name="name" id="name" placeholder="Enter Your Name">
                  <input type="email" class="forms" name="email" id="exampleInputEmail1" placeholder="Enter Your Email">
                  <input type="tel" class="forms"name="mob_no" id="exampleInputPassword1" placeholder="Enter Your Mobile No">
                  <textarea class="forms" name="description" id="exampleInputPassword1" placeholder="Description"></textarea>
                
                
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                </div>
                
             
                      </div>
                      <div class="modal-footer" style="justify-content:center;">
                        <div class="mt-6">
                          <input type="submit" class="main-btn btn btn-block font-weight-medium auth-form-btn" value="Submit" name="login">
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
    <!--[if IE]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->
    <header class="header-area">
      <div class="navbar-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                  <img src="assets/images/logo/logo.svg" alt="Logo" /> 
                </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="toggler-icon"> </span>
                  <span class="toggler-icon"> </span>
                  <span class="toggler-icon"> </span>
                </button>

                <div
                  class="collapse navbar-collapse sub-menu-bar"
                  id="navbarSupportedContent"
                >
                  <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="page-scroll active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#facts">Why</a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0)">Team</a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0)">Blog</a>
                    </li>
                  </ul>
                </div>
                <!-- navbar collapse -->

                <div class="navbar-btn d-none d-sm-inline-block">
                  <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Register
                  </button>
                </div>
           
              </nav>
              <!-- navbar -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- navbar area -->

      <div
        id="home"
        class="header-hero bg_cover"
        style="background-image: url(assets/images/header/banner-bg.svg)"
      >
        <div class="container">
          
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="header-hero-content text-center">
                <h3
                  class="header-sub-title wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.2s"
                >
                 AGREERENT
                </h3>
                <h2
                  class="header-title wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.5s"
                >
                Explore our site for easy lifestyle
                </h2>
                <p
                  class="text wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="0.8s"
                >
                Get a professional presence without the cost of a traditional office
                </p>
                <a
                  href="login.php"
                  class="main-btn wow fadeInUp"
                  data-wow-duration="1.3s"
                  data-wow-delay="1.1s"
                >
              DEMO
                </a>
              </div>
              <!-- header hero content -->
            </div>
          </div>
          <!-- row -->
          <div class="row">
            <div class="col-lg-12">
              <div
                class="header-hero-image text-center wow fadeIn"
                data-wow-duration="1.3s"
                data-wow-delay="1.4s"
              >
                <img src="assets/images/header/img.png" alt="hero" />
              </div>
              <!-- header hero image -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
        <div id="particles-1" class="particles"></div>
      </div>
      <!-- header hero -->
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== BRAND PART START ======-->
    <div class="brand-area pt-10">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div
              class="
                brand-logo
                d-flex
                align-items-center
                justify-content-center justify-content-md-between
              "
            >
              <!-- <div
                class="single-logo mt-30 wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.2s"
              >
                <img src="assets/images/brands/uideck.svg" alt="brand" />
              </div> -->
              <!-- single logo -->
              <!-- <div
                class="single-logo mt-30 wow fadeIn"
                data-wow-duration="1.5s"
                data-wow-delay="0.2s"
              >
                <img src="assets/images/brands/ayroui.svg" alt="brand" />
              </div> -->
              <!-- single logo -->
              <!-- <div
                class="single-logo mt-30 wow fadeIn"
                data-wow-duration="1.5s"
                data-wow-delay="0.3s"
              >
                <img src="assets/images/brands/graygrids.svg" alt="brand" />
              </div> -->
              <!-- single logo -->
              <!-- <div
                class="single-logo mt-30 wow fadeIn"
                data-wow-duration="1.5s"
                data-wow-delay="0.4s"
              >
                <img src="assets/images/brands/lineicons.svg" alt="brand" />
              </div> -->
              <!-- single logo -->
              <!-- <div
                class="single-logo mt-30 wow fadeIn"
                data-wow-duration="1.5s"
                data-wow-delay="0.5s"
              >
                <img
                  src="assets/images/brands/ecommerce-html.svg"
                  alt="brand"
                />
              </div> -->
              <!-- single logo -->
            </div>
            <!-- brand logo -->
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!--====== BRAND PART ENDS ======-->

    <!--====== SERVICES PART START ======-->
    <section id="features" class="services-area pt-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="section-title text-center pb-40">
              <div class="line m-auto"></div>
              <h3 class="title">
                How it works
                <span>Online Rent Agreement</span>
              </h3>
            </div>
            <!-- section title -->
          </div>
        </div>
        <!-- row -->
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-7 col-sm-8">
            <div
              class="single-services text-center mt-30 wow fadeIn"
              data-wow-duration="1s"
              data-wow-delay="0.2s"
            >
              <div class="services-icon">
                <img
                  class="shape"
                  src="assets/images/services/services-shape.svg"
                  alt="shape"
                />
                <img
                  class="shape-1"
                  src="assets/images/services/services-shape-1.svg"
                  alt="shape"
                />
                <i class="lni lni-baloon"> </i>
              </div>
              <div class="services-content mt-30">
                <h4 class="services-title">
                  <a href="javascript:void(0)">	Fill Details Online</a>
                </h4>
                <p class="text">
                 Fill your details properly
                </p>
                <!-- <a class="more" href="javascript:void(0)"
                  >Learn More <i class="lni lni-chevron-right"> </i>
                </a> -->
              </div>
            </div>
            <!-- single services -->
          </div>
          <div class="col-lg-4 col-md-7 col-sm-8">
            <div
              class="single-services text-center mt-30 wow fadeIn"
              data-wow-duration="1s"
              data-wow-delay="0.5s"
            >
              <div class="services-icon">
                <img
                  class="shape"
                  src="assets/images/services/services-shape.svg"
                  alt="shape"
                />
                <img
                  class="shape-1"
                  src="assets/images/services/services-shape-2.svg"
                  alt="shape"
                />
                <i class="lni lni-cog"> </i>
              </div>
              <div class="services-content mt-30">
                <h4 class="services-title">
                  <a href="javascript:void(0)">	Stamping & Printing</a>
                </h4>
                <p class="text">
                  We print the agreement on a legal stamp paper
                </p>
                <!-- <a class="more" href="javascript:void(0)"
                  >Learn More <i class="lni lni-chevron-right"> </i>
                </a> -->
              </div>
            </div>
            <!-- single services -->
          </div>
          <div class="col-lg-4 col-md-7 col-sm-8">
            <div
              class="single-services text-center mt-30 wow fadeIn"
              data-wow-duration="1s"
              data-wow-delay="0.8s"
            >
              <div class="services-icon">
                <img
                  class="shape"
                  src="assets/images/services/services-shape.svg"
                  alt="shape"
                />
                <img
                  class="shape-1"
                  src="assets/images/services/services-shape-3.svg"
                  alt="shape"
                />
                <i class="lni lni-bolt-alt"> </i>
              </div>
              <div class="services-content mt-30">
                <h4 class="services-title">
                  <a href="javascript:void(0)">Agreement is Registered!</a>
                </h4>
                <p class="text">
                  We get your agreement registered and send a soft copy to you within 3-4 days
                </p>
                <!-- <a class="more" href="javascript:void(0)"
                  >Learn More <i class="lni lni-chevron-right"> </i>
                </a> -->
              </div>
            </div>
            <!-- single services -->
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </section>
    <!--====== SERVICES PART ENDS ======-->

    <section id="about">
      <!--====== ABOUT PART START ======-->
      <div class="about-area pt-70">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div
                class="about-content mt-50 wow fadeInLeftBig"
                data-wow-duration="1s"
                data-wow-delay="0.5s"
              >
                <div class="section-title">
                  <div class="line"></div>
                  <h3 class="title">
                    What is 

                    <span>Rent Agreement?</span>
                  </h3>
                </div>
                <!-- section title -->
                <p class="text">
                  To formalize the home renting process, a tenant and a landlord must put the terms and conditions of the verbal agreement in writing and get the document registered to provide it legal validity. <br>This document is known as the rent agreement or the rental agreement. 




                </p>
                <!-- <a href="javascript:void(0)" class="main-btn">Try it Free</a> -->
              </div>
              <!-- about content -->
            </div>
            <div class="col-lg-6">
              <div
                class="about-image text-center mt-50 wow fadeInRightBig"
                data-wow-duration="1s"
                data-wow-delay="0.5s"
              >
                <img src="assets/images/about/about1.svg" alt="about" />
              </div>
              <!-- about image -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
        <div class="about-shape-1">
          <img src="assets/images/about/about-shape-1.svg" alt="shape" />
        </div>
      </div>
      <!--====== ABOUT PART ENDS ======-->

      <!--====== ABOUT PART START ======-->
      <div class="about-area pt-70">
        <div class="about-shape-2">
          <img src="assets/images/about/about-shape-2.svg" alt="shape" />
        </div>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-last">
              <div
                class="about-content ms-lg-auto mt-50 wow fadeInLeftBig"
                data-wow-duration="1s"
                data-wow-delay="0.5s"
              >
                <div class="section-title">
                  <div class="line"></div>
                  <h3 class="title">
                    Why <span>is a Rent Agreement necessary?</span>
                  </h3>
                </div>
                <!-- section title -->
                <p class="text">
                  It is important to have a rent agreement in place to take care of any disputes that may arise between landlord and tenant, due to varied reasons like:<br>
•	Tenant subletting the Property<br>
•	Landlord increasing rent without prior notice<br>
•	Tenant setting up business in the house premises<br>
•	Landlord denying returning the security deposit<br>
•	Tenant damaging the property<br>





                </p>
                <!-- <a href="javascript:void(0)" class="main-btn">Try it Free</a> -->
              </div>
              <!-- about content -->
            </div>
            <div class="col-lg-6 order-lg-first">
              <div
                class="about-image text-center mt-50 wow fadeInRightBig"
                data-wow-duration="1s"
                data-wow-delay="0.5s"
              >
                <img src="assets/images/about/about2.svg" alt="about" />
              </div>
              <!-- about image -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!--====== ABOUT PART ENDS ======-->

      <!--====== ABOUT PART START ======-->
      <div class="about-area pt-70">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div
                class="about-content mt-50 wow fadeInLeftBig"
                data-wow-duration="1s"
                data-wow-delay="0.5s"
              >
                <div class="section-title">
                  <div class="line"></div>
                  <h3 class="title">
                    <span>Frequently Asked Questions </span> on the Creation of Rental Agreement
                  </h3>
                </div>
                <!-- section title -->
                <p class="text">
                  Otherwise known for its traffic,India is home to many startups and IT companies. As a result, the demand for commercial and residential space is high. Seeking job opportunities, a number of people travel to Bangalore and become a part of it. Though finding a job is relatively easy, the tough part is to get through the rental processing, especially the rental agreement.
                  
                  
                </p>
                <!-- <a href="javascript:void(0)" class="main-btn">Try it Free</a> -->
              </div>
              <!-- about content -->
            </div>
            <div class="col-lg-6">
              <div
                class="about-image text-center mt-50 wow fadeInRightBig"
                data-wow-duration="1s"
                data-wow-delay="0.5s"
              >
                <img src="assets/images/about/about3.svg" alt="about" />
              </div>
              <!-- about image -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
        <div class="about-shape-1">
          <img src="assets/images/about/about-shape-1.svg" alt="shape" />
        </div>
      </div>
      <!--====== ABOUT PART ENDS ======-->
    </section>

    <!--====== VIDEO COUNTER PART START ======-->
    <section id="facts" class="video-counter pt-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 order-lg-last">
            <div
              class="counter-wrapper mt-50 wow fadeIn"
              data-wow-duration="1s"
              data-wow-delay="0.8s"
            >
              <div class="counter-content">
                <div class="section-title">
                  <div class="line"></div>
                  <h3 class="title">What is <span> the process of creating the Rent Agreement online?</span></h3>
                </div>
                <!-- section title -->
                <p class="text">
                  An online rent agreement can be created by filling in the owner-tenant-property details, making the payment, and digitally signing the agreement. A PDF of the online rent agreement will be shared with owner and tenant/s after everyone has signed.


                </p>
              </div>
              <!-- counter content -->
              <div class="row no-gutters">
                <div class="col-4">
                  <div
                    class="
                      single-counter
                      counter-color-1
                      d-flex
                      align-items-center
                      justify-content-center
                    "
                  >
                    <div class="counter-items text-center">
                      <span
                        class="count countup text-uppercase"
                        cup-end="125"
                      ></span>

                      <p class="text">Downloads</p>
                    </div>
                  </div>
                  <!-- single counter -->
                </div>
                <div class="col-4">
                  <div
                    class="
                      single-counter
                      counter-color-2
                      d-flex
                      align-items-center
                      justify-content-center
                    "
                  >
                    <div class="counter-items text-center">
                      <span
                        class="count countup text-uppercase"
                        cup-end="87"
                      ></span>
                      <p class="text">Active Users</p>
                    </div>
                  </div>
                  <!-- single counter -->
                </div>
                <div class="col-4">
                  <div
                    class="
                      single-counter
                      counter-color-3
                      d-flex
                      align-items-center
                      justify-content-center
                    "
                  >
                    <div class="counter-items text-center">
                      <span
                        class="count countup text-uppercase"
                        cup-end="59"
                      ></span>
                      <p class="text">User Rating</p>
                    </div>
                  </div>
                  <!-- single counter -->
                </div>
              </div>
              <!-- row -->
            </div>
            <!-- counter wrapper -->
          </div>
          <div class="col-lg-6">
            <div
              class="video-content mt-50 wow fadeIn"
              data-wow-duration="1s"
              data-wow-delay="0.5s"
            >
              <img class="dots" src="assets/images/video/dots.svg" alt="dots" />
              <div class="video-wrapper">
                <div class="video-image">
                  <img src="assets/images/video/video.png" alt="video" />
                </div>
                <div class="video-icon">
                  <a
                    href="https://www.youtube.com/watch?v=r44RKWyfcFw"
                    class="video-popup glightbox"
                  >
                    <i class="lni lni-play"> </i>
                  </a>
                </div>
              </div>
              <!-- video wrapper -->
            </div>
            <!-- video content -->
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </section>
    <!--====== VIDEO COUNTER PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-120">
      <div class="container">
        <div
          class="subscribe-area wow fadeIn"
          data-wow-duration="1s"
          data-wow-delay="0.5s"
        >
          <div class="row">
            <div class="col-lg-6">
              <div class="subscribe-content mt-45">
                <h2 class="subscribe-title">
                  The Journey <span>So Far</span>
                </h2>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="subscribe-form mt-50">
                <form action="insert4.php" method="post">
                  <input type="text" name="email" placeholder="Enter eamil" />
                  <button onclick="myFunction()" class="main-btn" type="submit">Subscribe</button>
                  <script>
                    function myFunction(){
                      alert("Subscribe  Sucessfully");
                    }
                  </script>
                </form>
              </div>
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- subscribe area -->
        <div class="footer-widget pb-100">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8">
              <div
                class="footer-about mt-50 wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.2s"
              >
                <a class="logo" href="javascript:void(0)">
                  <img src="assets/images/logo/logo.svg" alt="logo" />
                </a>
                <p class="text">
                  At this site, we've come a long way towards creating "one platform" for all your real estate needs. With LiveEasy, we're taking another giant leap in that direction.
                </p>
                <ul class="social">
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-facebook-filled"> </i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-twitter-filled"> </i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-instagram-filled"> </i>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0)">
                      <i class="lni lni-linkedin-original"> </i>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- footer about -->
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
              <div class="footer-link d-flex mt-50 justify-content-sm-between">
                <div
                  class="link-wrapper wow fadeIn"
                  data-wow-duration="1s"
                  data-wow-delay="0.4s"
                >
                  <div class="footer-title">
                    <h4 class="title">Quick Link</h4>
                  </div>
                  <ul class="link">
                    <li><a href="javascript:void(0)">Home</a></li>
                    <li><a href="javascript:void(0)">Features</a></li>
                    <li><a href="javascript:void(0)">About</a></li>
                    <li><a href="javascript:void(0)">Why</a></li>
                    <li><a href="javascript:void(0)">Team</a></li>
                    <li><a href="javascript:void(0)">Blog</a></li>
                  </ul>
                </div>
                <!-- footer wrapper -->
                <!-- <div
                  class="link-wrapper wow fadeIn"
                  data-wow-duration="1s"
                  data-wow-delay="0.6s"
                >
                  <div class="footer-title">
                    <h4 class="title">Resources</h4>
                  </div>
                  <ul class="link">
                    <li><a href="javascript:void(0)">Home</a></li>
                    <li><a href="javascript:void(0)">Page</a></li>
                    <li><a href="javascript:void(0)">Portfolio</a></li>
                    <li><a href="javascript:void(0)">Blog</a></li>
                    <li><a href="javascript:void(0)">Contact</a></li>
                  </ul>
                </div> -->
                <!-- footer wrapper -->
              </div>
              <!-- footer link -->
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12">
              <div
                class="footer-contact mt-50 wow fadeIn"
                data-wow-duration="1s"
                data-wow-delay="0.8s"
              >
                <div class="footer-title">
                  <h4 class="title">Contact Us</h4>
                </div>
                <ul class="contact">
                  <li>9930454816</li>
                  <li>info@agreerent.in</li>
                  <!-- <li>www.yourweb.com</li> -->
                  <li>
                    Aashiyana CHS Shop No 05, Plot no 29, Sector 11, Kamothe, Panvel <br />
                    Navi Mumbai.</li>
                  </li>
                </ul>
              </div>
              <!-- footer contact -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- footer widget -->
        <div class="footer-copyright">
          <div class="row">
            <div class="col-lg-12">
              <div class="copyright d-sm-flex justify-content-between">
                <div class="copyright-content">
                  <p class="text">
                    Designed and Developed by
                    <a href="https://tectignis.in/" rel="nofollow">TECTIGNIS IT SOLUTIONS PRIVATE LIMITED.</a>
                  </p>
                </div>
                <!-- copyright content -->
              </div>
              <!-- copyright -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- footer copyright -->
      </div>
      <!-- container -->
      <div id="particles-2"></div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->
    <a href="#" class="back-to-top"> <i class="lni lni-chevron-up"> </i> </a>
    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== Javascript Files ======-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/particles.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
