<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header class="col-12 bg-black">
    <?php include 'includes/menu.inc'; ?>
</header>
<div id="portfolio-banner" class="col-12 p-5">
    <div class="banner-text-container">
        <h1>
            Portfolio
        </h1>
        <h4>
            We're proud of our work
        </h4>
    </div>
</div>
<div class="col-12 d-flex flex-wrap bg-black py-3 py-md-5  px-1 px-md-5 justify-content-center">
    <div class="col-12 col-md-11 d-flex flex-wrap justify-content-center pb-5 mb-0 mt-0">

        <h2 class="text-center text-white mb-3 mt-5 c-border ps-2">We choose hard work</h2>
        <p class="col-12 text-center text-white mb-5">We have about 10 years of experience in our field and won't
            hesitate to apply our expertise to your brand</p>
        <div class="col-12 d-flex justify-content-center">
            <a class="text-center animate-btn" href="contact.php"><span>Contact us for a custom quote</span></a>
        </div>
    </div>
</div>
<div class="col-12 d-flex flex-wrap">
    <div class="col-5">
        <div id="carouselExampleControls" class="carousel slide carousel-fade d-flex h-100" data-bs-ride="carousel">
            <div class="carousel-inner h-100">
                <div class="carousel-item w-100 h-100 active">
                    <div class="portfolio-side-img d-block w-100 h-100"></div>
                </div>
                <div class="carousel-item w-100 h-100">
                    <div class="portfolio-side-img d-block w-100 h-100"></div>
                </div>
                <div class="carousel-item w-100 h-100">
                    <div class="portfolio-side-img d-block w-100 h-100"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-7 px-1 px-md-5 d-flex flex-wrap home-text-side">
        <h2 class="col-12 text-center mb-5 mt-5 dark-purple-text">Our favourites</h2>
        <p class="col-12 text-center mb-5 dark-grey-text">Our team picked their favourite projects for you to see. From
            logo design to complex custom development to network security solutions. We make it simple so you can focus
            on running your business.</p>
    </div>
</div>
<div class="portfolio-projects-container col-12 d-flex flex-wrap justify-content-start">
    <div class="col-12  d-flex flex-wrap justify-content-center ">
        <h2 class="text-center text-white mt-5 mb-1 pb-0 ps-2 c-border">Portfolio</h2>
        <h6 class="col-12 text-center text-white mt-2 mb-5 pb-0 ps-2">Take a look at some of our previous projects</h6>
    </div>
    <div class="col-12 ">
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/home-banner.png"/>
            <div class="project-context">
                <h5>Logo</h5>
            </div>
        </div>
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/home-image-1.jpg"/>
            <div class="project-context">
                <h5>Website</h5>
                <a href="">www.website.co.za</a>
            </div>
        </div>
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/C3mtj05r.jpg"/>
            <div class="project-context">
                <h5>Website</h5>
                <a href="">www.website.co.za</a>
            </div>
        </div>
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/FhJyKXkG.jpg"/>
            <div class="project-context">
                <h5>Website</h5>
                <a href="">www.website.co.za</a>
            </div>
        </div>
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/J9PIFL3lf.jpg"/>
            <div class="project-context">
                <h5>Website</h5>
                <a href="">www.website.co.za</a>
            </div>
        </div>
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/FhJyKXkGj.jpg"/>
            <div class="project-context">
                <h5>Website</h5>
                <a href="">www.website.co.za</a>
            </div>
        </div>
        <div class="col-3 col-lg-2 px-0 project-option-container">
            <img src="images/C3mtj055r.jpg"/>
            <div class="project-context">
                <h5>Website</h5>
                <a href="">www.website.co.za</a>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<footer>
    <?php include 'includes/footer.inc'; ?>
</footer>
</body>
<script>
    const myCarouselElement = document.querySelector('#carouselExampleSlidesOnly')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
        wrap: false
    })
</script>
</html>

