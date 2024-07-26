<?php
?>
<button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i
        class="fa fa-arrow-up primary-text"></i></button>


<!--SCROLL TO TOP-->
<script>
    let mybutton = document.getElementById("myBtn");
    window.onscroll = function () {
        scrollFunction()
    };
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
