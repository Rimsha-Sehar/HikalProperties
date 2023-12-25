<?php
?>
<style>
    .whatsappBtn {
        width: auto;
        position: fixed;
        bottom: 80px;
        right: 20px;
        color: #25d366;
        z-index: 1001;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }

    .whatsappBtn img {
        animation: spinLogo 4s linear infinite;
    }

    @keyframes spinLogo {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
}
</style>

<a href="https://wa.me/971585556605?text=Hello%20I%20am%20interested%20in%20inquiring%20about%20<?php echo $wa_project; ?>" class="whatsappBtn d-flex flex-column align-items-center justify-content-center" title="WhatsApp" style="width: 90px; height: 80px;">
    <div style="background: #000000; padding: 0px 5px; border-radius: 5px; margin-bottom: 5px;">
        <div class="gold-grad" style="font-size: 0.9rem; text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);">
            <?php
            if ($wa_lang == "English") {
                echo "Contact us";
            }
            elseif ($wa_lang == "Arabic") {
                echo "تواصل معنا";
            }
            else {
                echo "Contact us";
            }
            ?>
        </div>
    </div>
    <img id="businessLogo" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-logo.png" style="width: 40px;" />
</a>