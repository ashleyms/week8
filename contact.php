<?php
    include("partials/header.php");
?>
        <!-- Main Section -->
        <main class="container">
            <form method='POST' action='#' name="sentMessage" id="contactForm" class="contact-form">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Full Name: </label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                        </div>
                        <div class="form-group">
                            <label for="message">Message: </label>
                            <textarea name="str-message" class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message." rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary" >Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    <?php

include("partials/footer.php"); ?>
