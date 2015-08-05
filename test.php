<?php
$date = new DateTime("+6 months");
$date->modify("-" . ($date->format('j')-1) . " days");
echo $date->format('Y-m-d');
?>