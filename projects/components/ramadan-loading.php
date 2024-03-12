<?php
?>
<style>
        #loader-container {
            /*display: flex;
            justify-content: center;
            align-items: center;*/
            height: 100vh;
            background-color: #13174f;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .ramadan-container {
            padding: 7%;
            display: flex;
            justify-content: center;
            align-items: center;
/*            height: 100vh;*/
        }
        .moon {
          height: 150px;
          width: 150px;
          border-radius: 50%;
          margin: 0 auto;
          background: #ffff6c;
          background: linear-gradient(#ffff6c, yellow);
          position: relative;
          animation: fadeout 5s infinite;
        }
        .moon:before {
          content: " ";
          display: block;
          border-radius: 50%;
          width: 140px;
          height: 140px;
          background: #13174f;
          top: 5px;
          position: absolute;
          animation: moonphase 5s infinite ease;
        }
        @keyframes moonphase {
          0% {
            left: -150px;
            height: 140px;
            transform: rotate(0deg);
          }
          25% {
            height: 140px;
            top: 0;
          }
          90% {
            left: -10px;
            height: 140px;
            top: -5px;
            transform: rotate(45deg);
            opacity: 1;
          }
          100% {
            opacity: 0;
          }
        }
        @keyframes fadeout {
          0% {
            opacity: 0;
          }
          20% {
            opacity: 1;
          }
          80% {
            opacity: 1;
          }
          100% {
            opacity: 0;
          }
        }
        @media screen and (max-width: 800px) {
            .ramadan-container {
                flex-direction: column;
            }
        }

        .mosque-container {
	            width: 600px;
	  margin: auto;
	  position: fixed;
	  bottom: 60vh;
	  left: 50%;
	  transform: translateX(-50%);
	        }

	        .illustration {
	          display: flex;
	          justify-content: center;
	        /*  margin-top: 150px;*/
	        }

	        .mosque {
	  position: absolute;
	  width: 400px;
	  height: 200px;
	  border-radius: 1200px 1200px 0px 00px;
	  background-color: #0060e3;
	  background-image: linear-gradient(
	      45deg,
	      #0b57de 25%,
	      transparent 25%,
	      transparent 75%,
	      #0b57de 75%,
	      #0b57de
	    ),
	    linear-gradient(
	      -45deg,
	      #0b57de 25%,
	      transparent 25%,
	      transparent 75%,
	      #0b57de 75%,
	      #0b57de
	    );
	  background-size: 40px 40px;
	  margin: auto;
	}

	.mosque > div:nth-child(1) {
	  position: absolute;
	  width: 10px;
	  height: 50px;
	  bottom: 195px;
	  left: 195px;
	  background: #076de9;
	  z-index: -1;
	}

	.mosque > div:nth-child(1):after {
	  content: "";
	  position: absolute;
	  width: 10px;
	  height: 55px;
	  background: #096fea;
	  z-index: -1;
	}

	.mosque > div:nth-child(1):before {
	  content: "";
	  position: absolute;
	  width: 80px;
	  height: 80px;
	  bottom: 45px;
	  right: -60px;
	  border-radius: 50%;
	  transform: rotate(123deg);
	  box-shadow: 19px 0 0 0 #0a71eb;
	  z-index: -1;
	}

	.mosque > div:nth-child(2) {
	  position: absolute;
	  display: inline-block;
	  width: 0;
	  height: 0;
	  margin-left: 10.3em;
	  margin-right: 0.9em;
	  border-right: 0.3em solid transparent;
	  border-bottom: 0.7em solid #066ae8;
	  border-left: 0.3em solid transparent;
	  font-size: 1.3em;
	  margin-top: -95px;
	}
	.mosque > div:nth-child(2):before {
	  content: "";
	  display: block;
	  width: 0;
	  height: 0;
	  position: absolute;
	  top: 0.6em;
	  left: -1em;
	  border-right: 1em solid transparent;
	  border-bottom: 0.7em solid #066ae8;
	  border-left: 1em solid transparent;
	  -webkit-transform: rotate(-35deg);
	  transform: rotate(-35deg);
	}

	.mosque > div:nth-child(2):after {
	  content: "";
	  display: block;
	  width: 0;
	  height: 0;
	  position: absolute;
	  top: 0.6em;
	  left: -1em;
	  border-right: 1em solid transparent;
	  border-bottom: 0.7em solid #066ae8;
	  border-left: 1em solid transparent;
	  -webkit-transform: rotate(-35deg);
	  transform: rotate(-35deg);
	  -webkit-transform: rotate(35deg);
	  transform: rotate(35deg);
	}

	.mosque > div:nth-child(3) {
	  position: absolute;
	  width: 480px;
	  height: 320px;
	  top: 200px;
	  left: -39px;
	  background-image: linear-gradient(
	    to right top,
	    #0365e6,
	    #0072ed,
	    #007ff3,
	    #0e8cf9,
	    #2398fe
	  );
	  z-index: -1;
	}

	.mosque > div:nth-child(4) {
	  position: absolute;
	  width: 250px;
	  height: 320px;
	  left: 440px;
	  top: 200px;
	  background-image: linear-gradient(
	    to right top,
	    #0365e6,
	    #0072ed,
	    #007ff3,
	    #0e8cf9,
	    #2398fe
	  );
	  z-index: -1;
	}

	.mosque > div:nth-child(4):before {
	  content: "";
	  position: absolute;
	  transform: skewY(6deg);
	  transform-origin: top left;
	  width: 250px;
	  top: -35px;
	  height: 35px;
	  background: #273c75;
	}

	.mosque > div:nth-child(5) {
	  position: absolute;
	  width: 250px;
	  height: 320px;
	  left: -289px;
	  top: 200px;
	  background-image: linear-gradient(
	    to right top,
	    #0365e6,
	    #0072ed,
	    #007ff3,
	    #0e8cf9,
	    #2398fe
	  );
	  z-index: -1;
	}

	.mosque > div:nth-child(5):before {
	  content: "";
	  position: absolute;
	  transform: skewY(-6deg);
	  transform-origin: top left;
	  width: 250px;
	  top: -9px;
	  height: 35px;
	  background: #273c75;
	}

	.mosque > div:nth-child(6) {
	  position: absolute;
	  width: 130px;
	  top: 240px;
	  left: 135px;
	  height: 220px;
	  border-radius: 500px 500px 0 0;
	  background: #fceabb; /* fallback for old browsers */
	  background: -webkit-linear-gradient(
	    to bottom,
	    #f8b500,
	    #fceabb
	  ); /* Chrome 10-25, Safari 5.1-6 */
	  background: linear-gradient(
	    to bottom,
	    #f8b500,
	    #fceabb
	  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}

	.mosque > div:nth-child(7) {
	  position: absolute;
	  height: 25px;
	  top: 495px;
	  left: 110px;
	  width: 180px;
	  background: #1c8ef9; /* fallback for old browsers */
	  background: -webkit-linear-gradient(
	    to bottom,
	    #1c8ef9,
	    #117af0
	  ); /* Chrome 10-25, Safari 5.1-6 */
	  background: linear-gradient(
	    to bottom,
	    #1c8ef9,
	    #117af0
	  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

	  border-radius: 5px 5px 0 0;
	}

	.mosque > div:nth-child(7):before {
	  content: "";
	  position: absolute;
	  height: 25px;
	  top: -25px;
	  left: 10px;
	  width: 160px;
	  background: #1c8ef9;
	  background: -webkit-linear-gradient(to bottom, #1c8ef9, #117af0);
	  background: linear-gradient(to bottom, #40a2ff, #0068dc);
	  border-radius: 5px 5px 0 0;
	}

	.mosque > div:nth-child(7):after {
	  content: "";
	  position: absolute;
	  height: 25px;
	  top: -49px;
	  left: 20px;
	  width: 140px;
	  background: #1c8ef9;
	  background: -webkit-linear-gradient(to bottom, #1c8ef9, #117af0);
	  background: linear-gradient(to bottom, #40a2ff, #0068dc);
	}

	.mosque > div:nth-child(8) {
	  position: absolute;
	  width: 80px;
	  height: 140px;
	  top: 305px;
	  border-radius: 50px 50px 0 0;
	  left: 313px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(9) {
	  position: absolute;
	  width: 80px;
	  height: 140px;
	  top: 305px;
	  border-radius: 50px 50px 0 0;
	  left: 10px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(10) {
	  position: absolute;
	  width: 15px;
	  height: 20px;
	  top: 219px;
	  border-radius: 50px 50px 30px 30px;
	  left: 10px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(10):before {
	  content: "";
	  position: absolute;
	  width: 15px;
	  height: 20px;
	  border-radius: 50px 50px 30px 30px;
	  left: 35px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(10):after {
	  content: "";
	  position: absolute;
	  width: 15px;
	  height: 20px;
	  border-radius: 50px 50px 30px 30px;
	  left: 75px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(11) {
	  position: absolute;
	  width: 15px;
	  height: 20px;
	  top: 219px;
	  border-radius: 50px 50px 30px 30px;
	  left: 300px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(11):before {
	  content: "";
	  position: absolute;
	  width: 15px;
	  height: 20px;
	  border-radius: 50px 50px 30px 30px;
	  left: 35px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(11):after {
	  content: "";
	  position: absolute;
	  width: 15px;
	  height: 20px;
	  border-radius: 50px 50px 30px 30px;
	  left: 75px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(12) {
	  position: absolute;
	  width: 25px;
	  height: 35px;
	  top: 300px;
	  transform: skewX(-0deg);
	  border-radius: 50px 50px 30px 30px;
	  left: -230px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(12):before {
	  content: "";
	  position: absolute;
	  width: 25px;
	  height: 35px;
	  border-radius: 50px 50px 30px 30px;
	  left: 35px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	.mosque > div:nth-child(12):after {
	  content: "";
	  position: absolute;
	  width: 25px;
	  height: 35px;
	  border-radius: 50px 50px 30px 30px;
	  left: 75px;
	  background: #fceabb;
	  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
	  background: linear-gradient(to bottom, #f8b500, #fceabb);
	}

	@media screen and (max-width: 800px) {
    	.mosque-container {
            width: 600px;
		  margin: auto;
		  position: fixed;
		  bottom: 30vh;
		  left: 50%;
		  transform: translateX(-50%);
		        }

		.mosque {
		  position: absolute;
		  width: 200px; /* Adjusted size */
		  height: 100px; /* Adjusted size */
		  border-radius: 600px 600px 0 0; /* Adjusted size */
		  background-color: #0060e3;
		  background-image: linear-gradient(
		      45deg,
		      #0b57de 12.5%, /* Adjusted size */
		      transparent 12.5%,
		      transparent 37.5%, /* Adjusted size */
		      #0b57de 37.5%,
		      #0b57de
		    ),
		    linear-gradient(
		      -45deg,
		      #0b57de 12.5%, /* Adjusted size */
		      transparent 12.5%,
		      transparent 37.5%, /* Adjusted size */
		      #0b57de 37.5%,
		      #0b57de
		    );
		  background-size: 20px 20px; /* Adjusted size */
		  margin: 0;
		}

		.mosque > div:nth-child(1) {
		  position: absolute;
		  width: 5px; /* Adjusted size */
		  height: 25px; /* Adjusted size */
		  bottom: 97.5px; /* Adjusted size */
		  left: 97.5px; /* Adjusted size */
		  background: #076de9;
		  z-index: -1;
		}

		.mosque > div:nth-child(1):after {
		  content: "";
		  position: absolute;
		  width: 5px; /* Adjusted size */
		  height: 27.5px; /* Adjusted size */
		  background: #096fea;
		  z-index: -1;
		}

		.mosque > div:nth-child(1):before {
		  content: "";
		  position: absolute;
		  width: 40px; /* Adjusted size */
		  height: 40px; /* Adjusted size */
		  bottom: 22.5px; /* Adjusted size */
		  right: -30px; /* Adjusted size */
		  border-radius: 50%;
		  transform: rotate(123deg);
		  box-shadow: 9.5px 0 0 0 #0a71eb;
		  z-index: -1;
		}

		.mosque > div:nth-child(2) {
		  position: absolute;
		  display: inline-block;
		  width: 0;
		  height: 0;
		  margin-left: 5.15em; /* Adjusted size */
		  margin-right: 0.45em; /* Adjusted size */
		  border-right: 0.15em solid transparent; /* Adjusted size */
		  border-bottom: 0.35em solid #066ae8;
		  border-left: 0.15em solid transparent; /* Adjusted size */
		  font-size: 0.65em; /* Adjusted size */
		  margin-top: -47.5px; /* Adjusted size */
		}

		.mosque > div:nth-child(2):before {
		  content: "";
		  display: block;
		  width: 0;
		  height: 0;
		  position: absolute;
		  top: 0.3em; /* Adjusted size */
		  left: -0.5em; /* Adjusted size */
		  border-right: 0.5em solid transparent;
		  border-bottom: 0.35em solid #066ae8;
		  border-left: 0.5em solid transparent;
		  -webkit-transform: rotate(-35deg);
		  transform: rotate(-35deg);
		}

		.mosque > div:nth-child(2):after {
		  content: "";
		  display: block;
		  width: 0;
		  height: 0;
		  position: absolute;
		  top: 0.3em; /* Adjusted size */
		  left: -0.5em; /* Adjusted size */
		  border-right: 0.5em solid transparent;
		  border-bottom: 0.35em solid #066ae8;
		  border-left: 0.5em solid transparent;
		  -webkit-transform: rotate(-35deg);
		  transform: rotate(-35deg);
		  -webkit-transform: rotate(35deg);
		  transform: rotate(35deg);
		}

		.mosque > div:nth-child(3) {
		  position: absolute;
		  width: 240px; /* Adjusted size */
		  height: 160px; /* Adjusted size */
		  top: 100px; /* Adjusted size */
		  left: -19.5px; /* Adjusted size */
		  background-image: linear-gradient(
		    to right top,
		    #0365e6,
		    #0072ed,
		    #007ff3,
		    #0e8cf9,
		    #2398fe
		  );
		  z-index: -1;
		}

		.mosque > div:nth-child(4) {
		  position: absolute;
		  width: 125px; /* Adjusted size */
		  height: 160px; /* Adjusted size */
		  left: 220px; /* Adjusted size */
		  top: 100px; /* Adjusted size */
		  background-image: linear-gradient(
		    to right top,
		    #0365e6,
		    #0072ed,
		    #007ff3,
		    #0e8cf9,
		    #2398fe
		  );
		  z-index: -1;
		}

		.mosque > div:nth-child(4):before {
		  content: "";
		  position: absolute;
		  transform: skewY(3deg); /* Adjusted size */
		  transform-origin: top left;
		  width: 125px; /* Adjusted size */
		  top: -17.5px; /* Adjusted size */
		  height: 17.5px; /* Adjusted size */
		  background: #273c75;
		}

		.mosque > div:nth-child(5) {
		  position: absolute;
		  width: 125px; /* Adjusted size */
		  height: 160px; /* Adjusted size */
		  left: -144.5px; /* Adjusted size */
		  top: 100px; /* Adjusted size */
		  background-image: linear-gradient(
		    to right top,
		    #0365e6,
		    #0072ed,
		    #007ff3,
		    #0e8cf9,
		    #2398fe
		  );
		  z-index: -1;
		}

		.mosque > div:nth-child(5):before {
		  content: "";
		  position: absolute;
		  transform: skewY(-3deg); /* Adjusted size */
		  transform-origin: top left;
		  width: 125px; /* Adjusted size */
		  top: -4.5px; /* Adjusted size */
		  height: 17.5px; /* Adjusted size */
		  background: #273c75;
		}

		.mosque > div:nth-child(6) {
		  position: absolute;
		  width: 65px; /* Adjusted size */
		  top: 120px; /* Adjusted size */
		  left: 67.5px; /* Adjusted size */
		  height: 110px; /* Adjusted size */
		  border-radius: 250px 250px 0 0; /* Adjusted size */
		  background: #fceabb; /* fallback for old browsers */
		  background: -webkit-linear-gradient(
		    to bottom,
		    #f8b500,
		    #fceabb
		  ); /* Chrome 10-25, Safari 5.1-6 */
		  background: linear-gradient(
		    to bottom,
		    #f8b500,
		    #fceabb
		  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}

		.mosque > div:nth-child(7) {
		  position: absolute;
		  height: 12.5px; /* Adjusted size */
		  top: 247.5px; /* Adjusted size */
		  left: 55px; /* Adjusted size */
		  width: 90px; /* Adjusted size */
		  background: #1c8ef9; /* fallback for old browsers */
		  background: -webkit-linear-gradient(
		    to bottom,
		    #1c8ef9,
		    #117af0
		  ); /* Chrome 10-25, Safari 5.1-6 */
		  background: linear-gradient(
		    to bottom,
		    #1c8ef9,
		    #117af0
		  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		  border-radius: 2.5px 2.5px 0 0; /* Adjusted size */
		}

		.mosque > div:nth-child(7):before {
		  content: "";
		  position: absolute;
		  height: 12.5px; /* Adjusted size */
		  top: -12.5px; /* Adjusted size */
		  left: 5px; /* Adjusted size */
		  width: 80px; /* Adjusted size */
		  background: #1c8ef9;
		  background: -webkit-linear-gradient(to bottom, #1c8ef9, #117af0);
		  background: linear-gradient(to bottom, #40a2ff, #0068dc);
		  border-radius: 2.5px 2.5px 0 0; /* Adjusted size */
		}

		.mosque > div:nth-child(7):after {
		  content: "";
		  position: absolute;
		  height: 12.5px; /* Adjusted size */
		  top: -24.5px; /* Adjusted size */
		  left: 10px; /* Adjusted size */
		  width: 70px; /* Adjusted size */
		  background: #1c8ef9;
		  background: -webkit-linear-gradient(to bottom, #1c8ef9, #117af0);
		  background: linear-gradient(to bottom, #40a2ff, #0068dc);
		}

		.mosque > div:nth-child(8) {
		  position: absolute;
		  width: 40px; /* Adjusted size */
		  height: 70px; /* Adjusted size */
		  top: 152.5px; /* Adjusted size */
		  border-radius: 25px 25px 0 0; /* Adjusted size */
		  left: 156.5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(9) {
		  position: absolute;
		  width: 40px; /* Adjusted size */
		  height: 70px; /* Adjusted size */
		  top: 152.5px; /* Adjusted size */
		  border-radius: 25px 25px 0 0; /* Adjusted size */
		  left: 5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(10) {
		  position: absolute;
		  width: 7.5px; /* Adjusted size */
		  height: 10px; /* Adjusted size */
		  top: 109.5px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(10):before {
		  content: "";
		  position: absolute;
		  width: 7.5px; /* Adjusted size */
		  height: 10px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 17.5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(10):after {
		  content: "";
		  position: absolute;
		  width: 7.5px; /* Adjusted size */
		  height: 10px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 37.5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(11) {
		  position: absolute;
		  width: 7.5px; /* Adjusted size */
		  height: 10px; /* Adjusted size */
		  top: 109.5px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 150px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(11):before {
		  content: "";
		  position: absolute;
		  width: 7.5px; /* Adjusted size */
		  height: 10px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 17.5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(11):after {
		  content: "";
		  position: absolute;
		  width: 7.5px; /* Adjusted size */
		  height: 10px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 37.5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(12) {
		  position: absolute;
		  width: 12.5px; /* Adjusted size */
		  height: 17.5px; /* Adjusted size */
		  top: 150px; /* Adjusted size */
		  transform: skewX(0deg); /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: -115px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(12):before {
		  content: "";
		  position: absolute;
		  width: 12.5px; /* Adjusted size */
		  height: 17.5px; /* Adjusted size */
		  border-radius: 25px 25px 15px 15px; /* Adjusted size */
		  left: 17.5px; /* Adjusted size */
		  background: #fceabb;
		  background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
		  background: linear-gradient(to bottom, #f8b500, #fceabb);
		}

		.mosque > div:nth-child(12):after {
  			content: "";
  			position: absolute;
  			width: 12.5px; /* Adjusted size */
  			height: 17.5px; /* Adjusted size */
  			border-radius: 25px 25px 15px 15px; /* Adjusted size */
  			left: 37.5px; /* Adjusted size */
  			background: #fceabb;
  			background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);
  			background: linear-gradient(to bottom, #f8b500, #fceabb);
		}
	}
</style>

        <script>
        window.onload = function() {
            // Display loader for 3 to 5 seconds (3000 to 5000 milliseconds)
            setTimeout(function() {
                document.getElementById("loader-container").style.display = "none";
                document.getElementById("content").style.display = "block";
            }, Math.floor(Math.random() * (4000 - 2000 + 1)) + 3000);
        };
    </script>


    <div id="loader-container">
        <!-- <div class="loader"></div>
        <p>Loading...</p> -->

        <div class="overlay"></div>
        <div class="ramadan-container">
            <div class="english">
                <h1 class="gold-grad-anim" style="font-weight: bold;">Ramadan Mubarak</h1>
            </div>

            <div class="moon"></div>

            <div class="arabic">
                <h1 class="gold-grad-anim" style="font-weight: bold;">رمضان مبارك</h1>
            </div>
        </div>
        <div class="mosque-container">
            <div class="illustration">
                <div class="mosque">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                   <div></div>
                  <div></div>
                   <div></div>
                </div>
            </div>
        </div>
    </div>

