<?php
?>
<a href="https://wa.me/971585556605?text=Hello%20I%20am%20interested%20in%20inquiring%20about%20<?php echo $project; ?>" class="whatsappBtn d-flex align-items-center justify-content-center" title="WhatsApp" style="width: 80px; height: 50px;">
    <i id="whatsappIcon" class="fa-brands fa-whatsapp" style="transition: opacity 0.5s ease-in-out;"></i>
    <img id="businessLogo" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-logo.png" style="width: 30px; display: none; transition: opacity 0.5s ease-in-out;" />
</a>

<!-- WHATSAPP ANIMATION  -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const whatsappIcon = document.getElementById("whatsappIcon");
        const businessLogo = document.getElementById("businessLogo");

        function toggleVisibility() {
            // if (whatsappIcon.style.display === "none") {
            //     whatsappIcon.style.display = "block";
            //     businessLogo.style.display = "none";
            // } else {
            //     whatsappIcon.style.display = "none";
            //     businessLogo.style.display = "block";
            // }

            if (whatsappIcon.style.display === "none") {
                whatsappIcon.style.opacity = "1";
                whatsappIcon.style.display = "block";
                businessLogo.style.opacity = "0";
                businessLogo.style.display = "none";
            } else {
                whatsappIcon.style.opacity = "0";
                whatsappIcon.style.display = "none";
                businessLogo.style.opacity = "1";
                businessLogo.style.display = "block";
                
            }
        }
        setInterval(toggleVisibility, 2000);
    });
</script>