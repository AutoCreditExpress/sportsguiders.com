<?php
if ($login->isUserLoggedIn() == true) {

} elseif($pageID != 'unlocked') {
    header("Location: ".$webPath."login/");
    exit;
}