<?php

include "./classes/connection.php";
include "./classes/stats-model.php";
include "./classes/stats-controller.php";

$stats = new StatsController();

?>

<h4>Ukupno zaposlenih: <?php echo $stats->numOfEmployees ?></h4>
<h4>Prosečna plata: <?php echo $stats->avgSalary ?></h4>
<h4>Zaposlenih po poziciji: </h4><br><?php 
foreach($stats->employeesPerPosition as $row) {
    ?> <div> <?php
    foreach($row as $key => $value) {
        ?> <span><?php echo $value ?></span> <?php
    }
    ?> </div> <?php
}
?>