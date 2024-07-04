<?php
$deadline = [
    "July 7 2024 23:59:59 GMT+0400",
    "July 11 2024 23:59:59 GMT+0400",
    "July 15 2024 23:59:59 GMT+0400",
    "July 19 2024 23:59:59 GMT+0400",
    "July 23 2024 23:59:59 GMT+0400",
    "July 27 2024 23:59:59 GMT+0400",
    "July 31 2024 23:59:59 GMT+0400",
    "August 4 2024 23:59:59 GMT+0400",
    "August 8 2024 23:59:59 GMT+0400",
    "August 12 2024 23:59:59 GMT+0400",
    "August 16 2024 23:59:59 GMT+0400",
    "August 20 2024 23:59:59 GMT+0400",
    "August 24 2024 23:59:59 GMT+0400",
    "August 28 2024 23:59:59 GMT+0400",
    "September 1 2024 23:59:59 GMT+0400"
];

$today = strtotime("today");

foreach ($deadline as $date) {
    $deadlineTime = strtotime($date);
    if ($today < $deadlineTime) {
        echo $date;
        break;
    }
}
?>
