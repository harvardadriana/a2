<?php 

require('tools.php');
require('Form.php');

use DWA\Form;

// instantiate new FORM object/class
$form = new Form($_GET);

// get tiles values file
$tilesJson = file_get_contents('tiles.js');
$tilesValues = json_decode($tilesJson, true);

// values - get user inputs from Form
$word = $form->get('word', '');
$bonus = $form->get('bonus', '');
$bingo = $form->isChosen('bingo');

// variables
$score = 0;

if($form->isSubmitted()) {

	// convert input from user to caps
	$wordCaps = strtoupper($word);

	// get number of letters in the word
	$totalLetters = strlen($wordCaps);

	// sum values for each letter
	for ($i = 0; $i < $totalLetters; $i++) {
		$value += $tilesValues[$wordCaps];
	}

	// calculate bonus point if applicable
	if($bonus == "double") {
		$score = $score * 2;
	} 
	else if($bonus == "triple") {
		$score = $score * 3;
	}

	// include 50 point "bingo" if applicable
	if(($bingo) && ($totalLetters == 7)) {
		$score += 50;
	}

}