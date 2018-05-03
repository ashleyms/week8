<?php
    $pageTitle = "Contact";
    $HeroTitle = "Contact Us";
    $HeroImg = "defaultBanner.png";
    include("partials/header.php");
?>
        <!-- Main Section -->
        <main class="container">
            <!-- Media Gallery -->
            <section class="row">
                <!-- <article class="col-sm-12 col-md-6"> -->
                    <form method='POST' action='#' name="sentMessage" id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" name="phone-number" class="form-control" placeholder="Your Phone *" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="str-message" class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" name="submit" class="btn btn-xl get btn-submit" >Send Message</button>
                                </div>
                            </div>
                        </form>
                <!-- </article> -->
            </section>
        </main>
    <?php

include("partials/footer.php"); ?>
