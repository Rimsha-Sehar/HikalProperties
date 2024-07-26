<?php
$deadline = [
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
    "September 1 2024 23:59:59 GMT+0400",
    "September 5 2024 23:59:59 GMT+0400",
    "September 9 2024 23:59:59 GMT+0400",
    "September 13 2024 23:59:59 GMT+0400",
    "September 17 2024 23:59:59 GMT+0400",
    "September 21 2024 23:59:59 GMT+0400",
    "September 25 2024 23:59:59 GMT+0400",
    "September 29 2024 23:59:59 GMT+0400",
];

$today = strtotime("today");
$selected = "";

foreach ($deadline as $date) {
    $deadlineTime = strtotime($date);
    if ($today < $deadlineTime) {
        $selected = $date;
        break;
    }
}
?>
<div class="countdown-overlay">
    <div class="countdown-text">
        LIMITED TIME OFFER
    </div>
    <div class="countdown-clock">
        <div class="clock">
            <div class="clock__item">
                <span class="days"></span>
            </div>
            <div class="clock__colon">
                <div class="clock__colon-item"></div>
                <div class="clock__colon-item"></div>
            </div>
            <div class="clock__item">
                <span class="hours"></span>
            </div>
            <div class="clock__colon">
                <div class="clock__colon-item"></div>
                <div class="clock__colon-item"></div>
            </div>
            <div class="clock__item">
                <span class="minutes"></span>
            </div>
            <div class="clock__colon">
                <div class="clock__colon-item"></div>
                <div class="clock__colon-item"></div>
            </div>
            <div class="clock__item">
                <span class="seconds"></span>
            </div>
        </div>
    </div>
</div>

<!-- COUNTDOWN -->
<script>
    const deadline = '<?php echo $selected; ?>';
    function getTimeRemaining(endtime) {
        const total = Date.parse(endtime) - Date.parse(new Date());
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));

        return {
            total,
            days,
            hours,
            minutes,
            seconds
        };
    }

    function initializeClock(clockClass, endtime) {
        const clock = document.querySelector(clockClass);
        const daysSpan = clock.querySelector('.days');
        const hoursSpan = clock.querySelector('.hours');
        const minutesSpan = clock.querySelector('.minutes');
        const secondsSpan = clock.querySelector('.seconds');
        function updateClock() {
            const t = getTimeRemaining(endtime);
            daysSpan.innerHTML = ('0' + t.days).slice(-2);
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }
        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    initializeClock('.clock', deadline);
</script>
