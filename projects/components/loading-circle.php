<?php
?>
<style>
    .loading-circle{
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: #fcdc29;
        border-radius: 50%;
        animation: loading 1.5s cubic-bezier(.8, .5, .2, 1.4) infinite;
        transform-origin: bottom center;
        position: relative;
    }
    @keyframes loading{
        0%{
            transform: translateY(0px);
            background-color: #cda542;
        }
        20% {
            background-color: #e0c268;
        }
        40% {
            background-color: #f8e897;
        }
        60%{
            transform: translateY(50px);
            background-color: #faf0a0;
        }
        80% {
            background-color: #e0c268;
        }
        100%{
            transform: translateY(0px);
            background-color: #cda542;
        }
    }
    .loading-circle-1{
        animation-delay: 0.1s;
    }
    .loading-circle-2{
        animation-delay: 0.3s;
    }
    .loading-circle-3{
        animation-delay: 0.5s;
    }
    .loading-circle-4{
        animation-delay: 0.7s;
    }
    .loading-circle-5{
        animation-delay: 0.9s;
    }
    .loading-circle-6{
        animation-delay: 1.1s;
    }
    .loading-circle-7{
        animation-delay: 1.3s;
    }
    .loading-circle-8{
        animation-delay: 1.5s;
    }
</style>
<div class="loader">
    <span class="loading-circle loading-circle-1"></span>
    <span class="loading-circle loading-circle-2"></span>
    <span class="loading-circle loading-circle-3"></span>
    <span class="loading-circle loading-circle-4"></span>
    <span class="loading-circle loading-circle-5"></span>
    <span class="loading-circle loading-circle-6"></span>
    <span class="loading-circle loading-circle-7"></span>
    <span class="loading-circle loading-circle-8"></span>
</div>