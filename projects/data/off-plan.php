<?php
?>
<div class="container container-fluid py-5">
    <div class="row" style="text-align: center;">
        <h4 class="gold-grad-anim" style="font-weight: 900;">
            SOME OFF-PLAN PROJECTS
        </h4>
    </div>
    <div class="row">
        <?php foreach ($offplan as $index => $offplan) : ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3">
                <div style="border-radius: 15px; background-color: #000000; width: 100%; box-shadow: 0 19px 38px rgba(255,255,255,0.10), 0 15px 12px rgba(255,255,255,0.02);">
                    <div style="width: 100%;">
                        <img src="<?php echo $offplan['picture']; ?>" style="height: 200px; width: 100%; border-top-left-radius: 15px; border-top-right-radius: 15px;" />
                        <a a href="<?php echo $offplan['link']; ?>" target="_blank" style="color: #FFFFFF;">
                            <div class="p-3">
                                <div class="my-1" style="font-weight: bold;">
                                    <?php echo $offplan['project']; ?>
                                </div>
                                <div class="d-flex align-items-center my-1">
                                    <i class="fa-solid fa-location-dot gold-grad me-2"></i>
                                    <?php echo $offplan['address']; ?>
                                </div>
                                <div class="d-flex align-items-center my-1">
                                    <i class="fa-solid fa-bed gold-grad me-2"></i>
                                    <?php echo $offplan['bedrooms']; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>