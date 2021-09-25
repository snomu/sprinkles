<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Randomly-Generate Lines with Fixed Length" />
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<title>Randomly-Generate Lines with Fixed Length</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> 
	<style>
		body {
		background-color:#000033;
		}
		/* Full Screen Canvas */
		* { margin:0; padding:0; } /* remove the top and left whitespace */
		html, body { width:100%; height:100%; } /* just to be sure these are full screen*/
		canvas { display:block; } /* remove scrollbars */
		/* Button */
		a {
		position: fixed;
		top: 50%;
		left: 50%;
		width: 220px;
		height: 43px;
		margin-top: -30px;
		margin-left: -110px;
		padding-top: 10px;
		z-index:1;
		color:#ffffff;
		text-align:center;
		font-size:x-large;
		text-decoration: none;
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
		font-weight: 300;
		letter-spacing: 4px;
		border-style: solid;
		border-width: 2px;
		border-color: #ffffff;
		}
	</style>
</head>
<body>
	<a href="javascript:drawLines();">SPRINKLE</a>
	<canvas id="canvas1" ></canvas>
	<script>
		/* Main Method
		================================ */
		var can1 = document.getElementById('canvas1');
		var ctx1 = can1.getContext('2d');

		// Resize the canvas to fill browser window dynamically
		window.addEventListener('resize', drawLines, false);

		// Run first time
		drawLines();

		/* Functions
		================================ */
		function drawLines(){
	
			// Size Canvas to Window
			can1.width = window.innerWidth;
			can1.height = window.innerHeight;

			// Create Vars
			var startX = [];
			var startY = [];
			var endX = [];
			var endY = [];
			var angle = '';
			var maxX = window.innerWidth;
			var maxY = window.innerHeight;
			var lineDensity = getRandomNumber(500)/250000; // default: 300/250000
			var lineCount = getLineCount(lineDensity);
			var lineColor = [];
			var lineColorS = getRandomNumber(100)+'%'; // 0% is completely denatured (grayscale). 100% is fully saturated (full color). default: 100%
			var lineColorL = getRandomNumber(100)+'%'; // 0% is completely dark (black). 100% is completely light (white) default: 50%
			var lineWidth = getRandomNumber(5); // default: 1
			var lineLength = getRandomNumber(50); // default: 5

			// Generate Random Lines
			for (i = 0; i < lineCount; ++i) {
				startX[startX.length] = getRandomNumber(maxX);
				startY[startY.length] = getRandomNumber(maxY);
				angle = getRandomNumber(360);
				endX[endX.length] = Math.floor(startX[i]+lineLength*Math.cos(angle));
				endY[endY.length] = Math.floor(startY[i]+lineLength*Math.sin(angle));
				// lineColor[lineColor.length] = 'hsla('+getRandomNumber(360)+',100%,50%,1)';
				lineColor[lineColor.length] = 'hsla('+getRandomNumber(360)+','+lineColorS+','+lineColorL+',1)';
			}

			// Draw Lines to Canvas
			for (i = 0; i < startX.length; ++i) {
				ctx1.beginPath();
				ctx1.moveTo(startX[i],startY[i]);
				ctx1.lineTo(endX[i],endY[i]);
				ctx1.lineWidth = lineWidth;
				ctx1.strokeStyle = lineColor[i];
				ctx1.stroke();
			}

			// Update Background Color
			// document.querySelector("body").style.backgroundColor = 'hsla('+getRandomNumber(360)+',100%,50%,1)';
			document.querySelector("body").style.backgroundColor = 'hsla('+getRandomNumber(360)+','+getRandomNumber(100)+'%,'+getRandomNumber(100)+'%,1)';
		}

		function getRandomNumber(maximum){
			return Math.floor((Math.random() * maximum) + 1);
		}

		// function getRandomHexColor() {
		// 	var letters = '0123456789ABCDEF'.split('');
		// 	var color = '#';
		// 	for (var i = 0; i < 6; i++ ) {
		// 		color += letters[Math.round(Math.random() * 15)];
		// 	}
		// 	return color;
		// }

		function getLineCount(density){
			var pixelCount = window.innerWidth*window.innerHeight;
			var lineCount = Math.round(pixelCount*density);
			return lineCount;
		}
	</script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12934786-4', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>