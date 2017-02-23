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
			<!-- <img> wrapped in <p> tag for semantic reasons -->
			<p><img src="images/scrabble.jpg" alt="Scrabble Wooden Letters" /></p>
			
			<form method="GET" action="index.php">

				<!-- YOUR WORD: get user input -->
				<label for="word" class="textinput">Your word<br /><span class="required" >&#42;Required</span></label>
				<input type="text" name="word" id="word" class="textinput" maxlength="7" required value="<?=sanitize($word)?>"/>
				
				<!-- DISPLAYS ERROR MESSAGES: field required and letters only -->
				<?php if($errors): ?>
					<div class="errors">
						<?php foreach($errors as $error): ?>
							<?=$error?></br />
						<?php endforeach; ?>						
					</div>
				<?php endif; ?>

				<!-- BONUS POINT -->
				<fieldset>
					<legend>Bonus point</legend>
					<div id="bonus">
						<label><input type="radio" name="bonus" value="none" checked />None</label>
						<label><input type="radio" name="bonus" value="double" />Double word score</label>
						<label><input type="radio" name="bonus" value="triple" />Triple word score</label>
					</div>
				</fieldset>

				<!-- 50 POINT BINGO -->
				<fieldset>
					<legend>Include 50 point &#34;bingo&#34;&#63;<br /><span id="note">&#40;word that uses all 7 tiles&#41;</span></legend>
					<div id="bingo">
						<label><input type="checkbox" name="bingo" value="yes" checked>Yes</label>
					</div>
				</fieldset>

				<!-- SUBMIT BUTTON -->
				<input type="submit" name="calculate" value="Calculate" />

				<!-- DISPLAY SCORE  -->
				<div id="results">
					<p>Score: <?=$results?></p>
				</div>

			</form>

		</main>

	</body>
</html>