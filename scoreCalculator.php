<?php 

require('tools.php');

// get tiles values file
$tilesJson = file_get_contents('tiles.js');
$tiles = json_decode($tilesJson, true);

// get inputs from user
$word = (isset($_GET['word'])) ? $_GET['word'] : '';
$bonus = (isset($_GET['bonus'])) ? $_GET['bonus'] : '';
$bingo = (isset($_GET['bingo'])) ? $_GET['bingo'] : '';


// total score
$score = 0;

if($word != '') {

	// convert input from user to caps
	$wordCaps = strtoupper($word);

	// get number of letters in the word
	$totalLetters = strlen($wordCaps);

	// sum values for each letter
	for ($i = 0; $i < $totalLetters; $i++) {
		$value += $tiles[$wordCaps[$i]];
	}

	// calculate bonus point if applicable
	if($bonus == "double") {
		$value = $value * 2;
	} 
	else if($bonus == "triple") {
		$value = $value * 3;
	}

	// include 50 point "bingo" if applicable
	if(($bingo) && ($totalLetters == 7)) {
		$value += 50;
	}

}