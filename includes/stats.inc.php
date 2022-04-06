<?php
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

include "./classes/connection.php";
include "./classes/stats-model.php";
include "./classes/stats-controller.php";

$stats = new StatsController();

?>

<div class="stat-container">
    <div class="stat employees-sum">
        <p class="stat-title">Number of employees:</p>
        <p class="stat-number"><?php echo $stats->numOfEmployees ?></p>
    </div>
    <div class="stat average-salary">
        <p class="stat-title">Average salary:</p>
        <p class="stat-number"><?php echo $stats->avgSalary ?></p>
    </div>
</div>
<div class="graph-container">
    <?php foreach($stats->employeesPerPosition as $position) { ?>
        <div class="graph-column-container">
            <div class="graph-column" style="height: calc(100vh / <?php echo $stats->numOfEmployees ?> * <?php echo $position["num_employees"] ?>)"><?php echo $position["num_employees"] ?></div>
            <p><?php echo $position["position_name"] ?></p>
            <?php $position["num_employees"] ?>
        </div>
    <?php } ?>
</div>