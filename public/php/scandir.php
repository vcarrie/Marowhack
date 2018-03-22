<?php
$dir = "../../storage/app/transfert";
$files1 = scandir($dir);

echo json_encode($files1);