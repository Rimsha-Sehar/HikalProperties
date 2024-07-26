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
