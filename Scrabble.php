<?php

	class Scrabble {

		private $tiles;


	    /**
		*  GET A FILE: in this case tiles.js
		*/
		public function __construct($jsonPath) {

			$tilesJson = file_get_contents($jsonPath);
			$this->tiles = json_decode($tilesJson, true);

		}


	    /**
		*  CALCULATE THE VALUE OF EACH TILE AND RETURN THE TOTAL SCORE
		*/
		public function getScore(String $word, String $bonus, $bingo = true) {

			// CONVERT INPUT FROM USER INTO CAPS
			$wordCaps = strtoupper($word);		

			// LENGTH OF WORD FROM USER
			global $length;
			$length = strlen($wordCaps);

			// SUM VALUES OF EACH LETTER/TILE
			for ($i = 0; $i < $length; $i++) {
				$score += ($this->tiles[$wordCaps[$i]]);
			}

			// CALCULATE BONUS POINT IF APPLICABLE
			if($bonus == "double") {
				$score = $score * 2;
			} 
			else if($bonus == "triple") {
				$score = $score * 3;
			}

			// INCLUDE 50 POINTS "BINGO" IF WORD HAS 7 OR MORE LETTERS
			if(($bingo) && ($length >= 7)) {
				$score += 50;
			}

			return $score;

		}
		

	}


