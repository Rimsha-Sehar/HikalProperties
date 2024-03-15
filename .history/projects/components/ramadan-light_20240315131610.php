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
        top: 0;
        display: flex;
        align-items: start;
        justify-content: center;
    }

    @media screen and (max-width: 800px) {
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
    <div class="ramadan-mobile">
        <img class="mobile ramadan" loading="eager"
            src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
    </div>
</div>


<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

<div class="ramadan-lights mobile">
    <div class="ramadan-mobile">
        <img class="mobile ramadan" loading="eager"
            src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
    </div>
</div>
