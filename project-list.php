<?php
 
include "./includes/header.inc.php"
?>
<main>
    <div class="main-page shadow">
    <?php 
    include "./classes/task-view.php";
    $table = new TaskView;
    $table->createTaskTable();
    ?>
    </div>
</main>
<?php 
include "./includes/footer.inc.php"
?>