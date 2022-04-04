<?php

include "../classes/connection.php";
include "../classes/user-model.php";
include "../classes/user-controller.php";

$delete = new UserController();
$delete->deleteEmployee($_SERVER["QUERY_STRING"]);