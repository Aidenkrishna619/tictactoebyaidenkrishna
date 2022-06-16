<?php

namespace App;

class Game
{
	private static $movesTillNow = 0; //how many moves till now
	private $gameOver; //is game over?
	private $winner = null; // Player 'X' or '0'
 
	public function getGameOver()
	{
		return $this->gameOver;
	}	
 
	public function setGameOver($gameOver)
	{
		$this->gameOver = $gameOver;
	}
 
	public function setMovesTillNow()
	{
		self::$movesTillNow++;
	}
 
	public function getMovesTillNow()
	{
		return self::$movesTillNow;
	}
 
	public function setWinner($winner)
	{
		$this->winner = $winner;
	}
 
	public function getWinner()
	{
		return $this->winner;
	}
 
	//check if the player has won or the game is a draw
	public function checkForWinOrTie($board)
	{

		$movesTillNow = $this->getMovesTillNow();
 
		$boardslots = $board->getslots();

		if($movesTillNow<=9){
			
			for ($i=0; $i < 3; $i++) { 
				//row check:
				if(($boardslots[$i][0]!='_')&&($boardslots[$i][0]==$boardslots[$i][1])&&($boardslots[$i][1]==$boardslots[$i][2])){
					($boardslots[$i][0]=='X') ? $this->setWinner('X') : $this->setWinner('O');
					$this->setGameOver(true);
				}

				//column check
				if(($boardslots[0][$i]!='_')&&($boardslots[0][$i]==$boardslots[1][$i])&&($boardslots[1][$i]==$boardslots[2][$i])){
					($boardslots[0][$i]=='X') ? $this->setWinner('X') : $this->setWinner('O');
					$this->setGameOver(true);
				}
			}

			//left diagonal check
			if(($boardslots[0][0]!='_')&&($boardslots[0][0]==$boardslots[1][1])&&($boardslots[1][1]==$boardslots[2][2])){
				($boardslots[0][0]=='X') ? $this->setWinner('X') : $this->setWinner('O');
				$this->setGameOver(true);
			}

			//right diagonal check
			if(($boardslots[0][2]!='_')&&($boardslots[0][2]==$boardslots[1][1])&&($boardslots[1][1]==$boardslots[2][0])){
				($boardslots[0][2]=='X') ? $this->setWinner('X') : $this->setWinner('O');
				$this->setGameOver(true);
			}
		}else{
			$this->setGameOver(true);
		}

		// rare case
		//After 9th move, then the game status is a draw
		if(($movesTillNow==9)&&($this->getWinner()==null)){
			$this->setGameOver(true);
		}
	}

	
}
