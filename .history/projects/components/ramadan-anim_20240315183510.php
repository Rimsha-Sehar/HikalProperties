<?php
?>
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

<style>
    .ramadan-lights-stars {
        position: fixed;
        top: -5vh;
        width: 400px;
        height: auto;
        z-index: 3;
    }

    @media screen and (max-width: 800px) {
        .ramadan-lights-stars {
            width: 200px;
        }
    }
</style>

<div class="d-flex align-items-start justify-content-end">
    <dotlottie-player src="https://lottie.host/f8e4cb5e-a93a-4b74-bb01-9ce85e5fa6e5/1NBQ1z6I5f.json"
        background="transparent" speed="1" class="ramadan-lights-stars" loop autoplay></dotlottie-player>
</div>
