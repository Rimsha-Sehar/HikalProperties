<?php
?>
<div id="bottom-nav" onclick="scrollToForm();">
    <div style="font-weight: bold; font-size: 1rem; color: var(--text-on-gold)">
        REGISTER NOW
    </div>
</div>

<script>
    function scrollToForm() {
        var formDiv = document.getElementById('form-container');
        formDiv.scrollIntoView({ behavior: 'smooth' });
    }
</script>
<!-- HIDE BOTTOM NAV ON SCROLL TO END -->
<script>
    window.addEventListener('scroll', function () {
        var bottomNav = document.getElementById('bottom-nav');
        var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        var windowHeight = window.innerHeight;
        var documentHeight = document.body.scrollHeight;
        if (scrollPosition + windowHeight >= documentHeight) {
            bottomNav.style.display = 'none';
        } else {
            bottomNav.style.display = 'block';
        }
    });
</script>
