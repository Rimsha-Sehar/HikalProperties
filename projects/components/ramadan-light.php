<?php
?>

<style>
	.ramadan {
	    width: 200px;
	    position: absolute;
	    left: 10px;
	    z-index: 2;
	}

	@media screen and (max-width: 800px) {
	    .ramadan-mobile {
	        position: relative;
	        display: flex;
	        justify-content: center;
	    } 
	    .ramadan{
	        position: relative;
	        width: 150px;
	    }
	}
</style>	

<img class="desktop ramadan" loading="eager" src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
<div class="ramadan-mobile">
    <img class="mobile ramadan" loading="eager" src="https://hikalproperties.com/projects/assets/images/events/ramadan.svg" />
    <!-- <img class="mobile ramadan" loading="eager" src="../../assets/images/events/ramadan.svg" /> -->
</div>