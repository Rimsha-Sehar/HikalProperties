<?php
?>

<style>
    .ramadan {
        width: 200px;
        position: absolute;
        left: 10px;
        z-index: 2;
    }

    .ramadan-lights {
        position: relative;
        top: 0;
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

<!-- <img class="desktop ramadan" loading="eager" src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
<div class="ramadan-mobile">
    <img class="mobile ramadan" loading="eager" src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
</div> -->


<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

<div class="ramadan-lights">
<div class="d-flex align-items-start justify-content-center">
    <dotlottie-player src="https://lottie.host/f8e4cb5e-a93a-4b74-bb01-9ce85e5fa6e5/1NBQ1z6I5f.json"
        background="transparent" speed="1" style="width: 300px;" loop autoplay class="desktop"></dotlottie-player>
    <dotlottie-player src="https://lottie.host/f8e4cb5e-a93a-4b74-bb01-9ce85e5fa6e5/1NBQ1z6I5f.json"
        background="transparent" speed="1" style="width: 300px;" loop autoplay></dotlottie-player>

    <img class="desktop ramadan" loading="eager"
        src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
    <div class="ramadan-mobile">
        <img class="mobile ramadan" loading="eager"
            src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
    </div>

    <dotlottie-player src="https://lottie.host/f8e4cb5e-a93a-4b74-bb01-9ce85e5fa6e5/1NBQ1z6I5f.json"
        background="transparent" speed="1" style="width: 300px;" loop autoplay></dotlottie-player>
    <dotlottie-player src="https://lottie.host/f8e4cb5e-a93a-4b74-bb01-9ce85e5fa6e5/1NBQ1z6I5f.json"
        background="transparent" speed="1" style="width: 300px;" loop autoplay class="desktop"></dotlottie-player>
</div>
</div>
