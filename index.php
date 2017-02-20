<?php require('scoreCalculator.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>DWA15 Scrabble</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>

	<main>
		<h1>Scrabble Word Score Calculator</h1>
		<p><img src="images/scrabble.jpg" alt="Scrabble Wooden Letters" /></p>
		
		<form method="GET" action="/">

			<!-- YOUR WORD -->
			<ul>
			<li><label for="word">Your word<br /><span class="required">&#42;Required</span></label>
			<input type="text" name="word" id="word" /></li>
			</ul>

			<!-- BONUS POINT -->
			<ul>

			<legend>Bonus point</legend>
				<li><label><input type="radio" name="bonus" value="none" />None</label></li>
				<li><label><input type="radio" name="bonus" value="doubleWordScore" />Double word score</label></li>
				<li><label><input type="radio" name="bonus" value="tripleWordScore" />Triple word score</label></li>
			</ul>

			<!-- BINGO -->
			<ul>
					<legend>Include 50 point &#34;bingo&#34;&#63;<br />&#40;word that uses all 7 tiles&#41;</legend>
				<li><label><input type="checkbox" name="bingo" value="yes" checked>Yes</label></li>
			</ul>

			<!-- SUBMIT BUTTON -->
			<p><input type="submit" name="calculate" value="Calculate" /></p>

			<!-- RESULT OF POINTS -->

		</form>
	</main>
</body>
</html>