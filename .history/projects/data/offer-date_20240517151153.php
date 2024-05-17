<?php
$deadline = [
    "May 20 2024 23:59:59 GMT+0400",
    "May 24 2024 23:59:59 GMT+0400",
    "May 28 2024 23:59:59 GMT+0400",
    "June 1 2024 23:59:59 GMT+0400",
    "June 5 2024 23:59:59 GMT+0400",
    "June 9 2024 23:59:59 GMT+0400",
    "June 13 2024 23:59:59 GMT+0400",
    "June 17 2024 23:59:59 GMT+0400",
    "June 21 2024 23:59:59 GMT+0400"
];

$today = strtotime("today");

foreach ($deadline as $date) {
    $deadlineTime = strtotime($date);
    if ($today < $deadlineTime) {
        echo ""
    }
}
?>
