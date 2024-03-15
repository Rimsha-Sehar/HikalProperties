<?php
?>

<style>
    .ramadan {
        width: 200px;
        position: relative;
        left: 10px;
        z-index: 2;
    }

    .ramadan-lights {
        position: absolute;
    }

    @media screen and (max-width: 800px) {
        .ramadan-lights {
            position: relative;
        }

        .ramadan-mobile {
            /* position: relative; */
            display: flex;
            justify-content: center;
        }

        .ramadan {
            /* position: relative; */
            width: 150px;
        }
    }
</style>

<div class="desktop">
    <img class="desktop ramadan" loading="eager"
        src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
</div>

<div class="mobile">
    <!-- <div class="ramadan-mobile"> -->
    <img class="mobile ramadan" loading="eager"
        src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
    <!-- </div> -->
</div>
