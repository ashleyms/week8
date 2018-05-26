<?php include("partials/cartModal.php"); ?>
<?php include("partials/aboutModal.php"); ?>
    <!-- Open Footer -->
    <footer class="main-footer row">
        <div class="col-sm-4 col-md-5">
            <!-- Open Email Form -->
            <p class="newsletter">Join our mailing list to be the first to hear about new products!</p>
            <form action="#" method="post">
                <input type="email" name="email" class="newsletter-input big-input" placeholder="email@example.com" required/>
                <input type="submit" class="btn btn-primary big-input signup" value="SUBSCRIBE">
            </form>
            <!-- Close Email Form -->
        </div>
        <div class="col-sm-4 col-md-7">
          <img class="footer-logo" src="assets/logo.png" alt="logo"/>
        </div>
        <!-- Copyright Footer -->
        <div class="sub-footer">
            <p>&#xA9; <?php echo date("Y"); ?> East Van Jam</p>
        </div>
        <!-- Close Copyright -->
    </footer>
    <!-- Close Footer -->

    <!-- Script Links -->
    <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/jquery.js"></script> -->
    </body>
</html>
