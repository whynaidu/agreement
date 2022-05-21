<?php
date_default_timezone_set('Asia/Kolkata');
$currentTime = time();
if ((date('H', $currentTime)) > 13 || (date('H', $currentTime)) < 12) {
 echo 'Good Afternoon, ';
}else{
    echo 'Good Morning, ';
}

?>