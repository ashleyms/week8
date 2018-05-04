<?php
    include("partials/header.php");
?>
        <!-- Shop Main Section -->
        <main class="container">
            <!-- Media Gallery -->
            <section class="row">
            <?php foreach ($arrExtraContent as $navItem) { 
                $data = explode("|", $navItem['strExtraElement']); ?>
                <article class="col-sm-12 col-md-6 media-section">
                    <img class="media-img" src="assets/<?=$data[0]?>" alt ="media 1 image">
                    <p><?=$data[1]?></p>
                    <p><a href="#"><?=$data[2]?></a></p>
                </article>
            <?php } ?>
            </section>
        </main>
    <?php
// <!-- Footer -->
include("partials/footer.php"); ?>