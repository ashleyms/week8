<?php
    include("partials/session-start.php");
    include("partials/cmsheader.php");
?>
<!-- Open Container -->
<main class="container-fluid">
	<h1 class="cms-head">Welcome!</h1>
    <p class="descipt">Click any link below to get started! From here you can add, edit and delete any of your products, pages or orders. If you need assistance please email help@email.com or call 604-123-5555.</p>
    <!-- Open Quick Links -->
    <section class="row">
        <!-- Add Products -->
        <a class="cms-dashboard back-prod col-sm-12 col-md-3" href="pages.php">
            <h3>
                <i class="fa fa-file-o fa-3x"></i>
            </h3>
            <p> Pages </p>
        </a>
        <!-- Add Testimonials -->
        <a class="cms-dashboard back-test col-sm-12 col-md-3" href="products.php">
            <h3>
                <i class="fa fa-plus fa-3x"></i>
            </h3>
            <p>Products</p>
        </a>
        <!-- Add Users -->
        <a class="cms-dashboard back-user col-sm-12 col-md-3" href="orders.php">
            <h3>
                <i class="fa fa-shopping-cart fa-3x"></i>
            </h3>
            <p>Orders</p>
        </a>
    </section>
    <!-- Close Links -->

</main>
<!-- Close Container -->
</body>
</html>
