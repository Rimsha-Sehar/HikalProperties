<?php
?>
<style>
	.loading-animation {
  		/*position: absolute;
  		left: 50%;
  		top: 50%;
  		transform: translate(-50%, -50%) scale(4);*/
  		position: relative;
  		transform: scale(4);
	}

	.user-icon {
	  	position: absolute;
	  	transform: translate(-50%, -50%);
	}

	.circle {
	  	border: 1px solid black;
	  	border-top: 1px solid black;
	  	border-radius: 50%;
	  	position: absolute;
	  	animation: spin 5s infinite;
	  	transform: translate(-50%, -50%);
	}

	.a { width: 1rem; height: 1rem; animation-delay: 0s; }
	.b { width: 1.5rem; height: 1.5rem; animation-delay: .1s; }
	.c { width: 2rem; height: 2rem; animation-delay: .2s; }
	.d { width: 2.5rem; height: 2.5rem; animation-delay: .3s; }
	.e { width: 3rem; height: 3rem; animation-delay: .4s; }

	@keyframes spin {
		/*   0% {transform: translate(-50%, -50%) rotateX(0) rotateY(0) rotateZ(0);} */
  		10% {
  			transform: translate(-50%, -50%) rotateX(0) rotateY(0) rotateZ(0);
  			border: 1px solid #cda542;
  		}
  		30% {
  			transform: translate(-50%, -50%) rotateX(0) rotateY(180deg) rotateZ(0);
  			border: 1px solid #e0c268;
  		}
  		50% {
  			transform: translate(-50%, -50%) rotateX(180deg) rotateY(360deg) rotateZ(0);
  			border: 1px solid #f8e897;
  		}
  		70% {
  			transform: translate(-50%, -50%) rotateX(180deg) rotateY(360deg) rotateZ(360deg);
  			border: 1px solid #faf0a0;
  		}
  		80% {
  			transform: translate(-50%, -50%) rotateX(180deg) rotateY(360deg) rotateZ(360deg);
  			border: 1px solid #e0c268;
  		}
		/*   100% {transform: translate(-50%, -50%) rotateX(0) rotateY(0) rotateZ(0);} */
	}
</style>

<div class="relative" style="display: inline-block">
	<div class="loading-animation">
	  	<!-- <div class="circle a"></div> -->
	  	<div class="circle b"></div>
	  	<div class="circle c"></div>
	  	<div class="circle d"></div>
	  	<!-- <div class="circle e"></div> -->
	  	<div class="user-icon">
	  		<i class="fa-regular fa-user gold-grad" style="font-size: 0.5rem;"></i>
	  	</div>
	</div>
</div>
