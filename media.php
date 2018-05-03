<?php
    include("partials/header.php");
    $arrMediaContent = $pageContent->getResults("SELECT extra_element_table.strExtraElement 
    FROM `pages_table` 
    LEFT JOIN extra_element_table 
    ON pages_table.id = extra_element_table.nPageId 
    WHERE pages_table.strName = '".$_GET['id']."'
    ORDER BY extra_element_table.id ASC");

?>
        <!-- Main Section -->
        <main class="container">
            <!-- Media Gallery -->
            <section class="row">
            <?php foreach ($arrMediaContent as $navItem) { 
                $data = explode("|", $navItem['strExtraElement']); ?>
                <article class="col-sm-12 col-md-6 media-section">
                    <img class="media-img" src="assets/<?=$data[0]?>" alt ="media 1 image">
                    <p><?=$data[1]?></p>
                    <p><?=$data[2]?></p>
                </article>
            <?php } ?>
            </section>
        </main>
    <?php

include("partials/footer.php"); ?>
