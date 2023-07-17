<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact gravitysplash for any website design, website development, web-app development, website maintenance and network supoort">
    <link rel="icon" type="image/x-icon" href="images/favi/favicon.ico">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header class="col-12 bg-black">
    <?php include 'includes/menu.inc'; ?>
</header>
<div id="contact-banner" class="col-12 p-5">
    <div class="banner-text-container">
        <h1>
            Contact
        </h1>
        <h4>
            We'd love to hear about any projects you would like some help on
        </h4>
    </div>
</div>
<div class="pricing-options-container-full"></div>
<div class="col-12 d-flex flex-wrap bg-black py-3 py-md-5  px-1 px-md-5 justify-content-center">
    <div class="col-12 col-md-11 d-flex flex-wrap justify-content-center pb-5 mb-0 mt-0">
        <h2 class="text-center text-white mb-3 mt-5 c-border ps-2">Get in contact with us</h2>
        <p class="col-12 text-center text-white mb-5">Contact us with your requirements and we will supply you with a quote</p>
    </div>
    <div class="col-12 col-lg-11 d-flex flex-wrap justify-content-center">
        <form name="contactform" id="contactform" method="post" action="#" class="d-flex flex-wrap mb-5">
            <div class="col-12 col-lg-6 p-2">
                <input name="firstname" id="firstname" class="form-control" placeholder="First name" aria-label="First name"/>
            </div>
            <div class="col-12 col-lg-6 p-2">
                <input name="companyname" id="companyname" class="form-control" placeholder="Company name" aria-label="Company name"/>
            </div>
            <div class="col-12 col-lg-6 p-2">
                <input name="email" id="email" class="form-control" placeholder="Email" aria-label="Email"/>
            </div>
            <div class="col-12 col-lg-6 p-2">
                <input name="contact" id="contact" class="form-control" placeholder="Contact" aria-label="Contact"/>
            </div>
            <div class="col-12 p-2">
                <textarea rows="8" name="message" id="message" class="form-control" placeholder="Message" aria-label="Message" ></textarea>
            </div>

            <div class="col-12 p-2 my-5 d-flex justify-content-end">
                <button class="me-2" id="contact-btn" onclick="submitForm()" type="button">Submit</button>
            </div>
        </form>

        <div id="alertContainer" class="alert" role="alert">
            <p id="alertContent"></p>
        </div>
    </div>
</div>


<div class=" col-12 d-flex flex-wrap justify-content-center">
    <div class="blurry between-blurry">
        <h2 class="pt-5 mt-5 text-center">Custom Requests</h2>
        <p class="pb-5 mb-5 text-center">If you do not see what you're looking for then please contact us to start a personalised yourney</p>
    </div>
</div>
<footer>
    <?php include 'includes/footer.inc'; ?>
</footer>
</body>
<script src="js/jquery-3.7.0.min.js"></script>
<script src="js/script.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=6Lf7WfQmAAAAAHhOpdRIh9csj9ptrvKo6EV3_GuX"></script>
<script>
    function submitForm() {
        grecaptcha.ready(function () {
            grecaptcha.execute('6Lf7WfQmAAAAAHhOpdRIh9csj9ptrvKo6EV3_GuX', {action: 'homepage'}).then(function (token) {
                sendForm(token);
            });
        });
    }

    function sendForm(token) {

        $('#contact-btn').html('Sending <i class="fas fa-circle-notch fa-spin"></i>');
        const body = {
            'token': token,
            'message': $('#message').val(),
            'name': $('#name').val(),
            'email': $('#email').val(),
            'number': $('#number').val(),
            'company': $('#companyname').val(),
        };

        console.log(body);

        $.post("php/contact.php", body, function (data, status) {
            $('#contact-btn').html('Send');
            if (status !== 'success') {
                showAlert('error', "There was an error submitting your enquiry.");
            } else {
                const body = JSON.parse(data);
                if (body.type === 'success') {
                    clearForm();
                    $('#exampleModal').modal('hide');
                }
                showAlert(body.type, body.message);
            }
        });
    }

    function clearForm() {
        $('#message').val('');
        $('#name').val('');
        $('#email').val('');
        $('#number').val('');
    }
</script>
<script>

    function showAlert(type, message) {
        const alertContainer = $('#alertContainer');
        $('#alertContent').text(message);
        if (type === 'error') {
            alertContainer.addClass('alert-danger');
        } else {
            alertContainer.addClass('alert-success');
        }
        alertContainer.addClass('active');
        setTimeout(hideAlert, 5000);
    }

    function hideAlert() {
        const alertContainer = $('#alertContainer');
        alertContainer.removeClass('active');
        alertContainer.removeClass('alert-danger');
        alertContainer.removeClass('alert-success');
        $('#alertContent').text('');
    }
</script>
</html>

