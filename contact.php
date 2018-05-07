<?php
    session_start();
    include("partials/header.php");
    
?>
        <!-- Contact Main Section -->
        <main class="container">
            <!-- Contact Form -->
            <form method='POST' action='#' name="sentMessage" id="contactForm" class="contact-form">
                <p><?=$arrPageContent[0]['strText'];?></p>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">full name: </label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                        </div>
                        <div class="form-group">
                            <label for="email">email: </label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                        </div>
                        <div class="form-group">
                            <label for="message"message: </label>
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
// <!-- Footer -->
include("partials/footer.php"); ?>
