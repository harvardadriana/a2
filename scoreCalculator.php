<?php 

require('tools.php');
require('Form.php');

use DWA\Form;


// INSTANTIATE NEW OBJECTS/CLASSES
$form = new Form($_GET);


// CALL FILE: get the file with tiles values
$tilesJson = file_get_contents('tiles.js');
$tilesValues = json_decode($tilesJson, true);


// VALUES: get user inputs from Form
$word = $form->get('word', '');
$bonus = $form->get('bonus', '');
$bingo = $form->isChosen('bingo');


// DEFINE VARIABLES
global $score;


if($form->isSubmitted()) {


	// VALIDATION: for required field and letters only
	$errors = $form->validate([
		'word' => 'required|alpha',
	]);


	// CONVERT INPUT FROM USER INTO CAPS
	$wordCaps = strtoupper($word);


	// GET LENGTH IN 'WORD': used for efficiency purposes
	$totalLetters = strlen($wordCaps);


	// SUM VALUES OF EACH LETTER/TILE
	for ($i = 0; $i < $totalLetters; $i++) {
		$score += $tilesValues[$wordCaps[$i]];
	}


	// CALCULATE BONUS POINT IF APPLICABLE
	if($bonus == "double") {
		$score = $score * 2;
	} 
	else if($bonus == "triple") {
		$score = $score * 3;
	}


	// INCLUDE 50 POINTS "BINGO" IF 7 LETTERS WORD
	if(($bingo) && ($totalLetters == 7)) {
		$score += 50;
	}

}