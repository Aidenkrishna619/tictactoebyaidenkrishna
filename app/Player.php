<?php

namespace App;

class Player
{
	
	private $playerMark; // '0' or 'X'
 
	//getters and setters for player marks
	public function setPlayerMark($mark)
	{
		$this->playerMark = $mark;
	}
 
 	public function getPlayerMark()
	{
		return $this->playerMark;
	}
 
	//the player can put x or 0 by choosing the slot (row and column)
	public function makeMove($board, $move, $game)
	{
		$mark = $this->getPlayerMark();
		$board->markCell($move, $mark);
		$game->setMovesTillNow();
		
		$game->checkForWinOrTie($board);
		
		$board->display();
	}

	public function askInputForMove($board,$game)
	{
		
		//get current player
		$currentPlayer = ($this->getPlayerMark()=='X') ? 'Player 1 (X)' : 'Player 2 (O)';

		//take input for row and column
		$rowInput = readline($currentPlayer." - Enter Row Number: ");
		$columnInput = readline($currentPlayer." - Enter Column Number: ");

		//create a new instance of move and set row, column of move
		$move = new Move;
		$move->setRow($rowInput);
		$move->setColumn($columnInput);

		//check if move is valid
		$move = $board->checkAvailable($move);

		//If move is valid : make move else ask for input again
		if($move->getValid()){
			return $this->makeMove($board,$move,$game);
		}
		echo "INVALID MOVE!\n\n";
		return $this->askInputForMove($board,$game);
	}

	//when Player 2 is Computer : this function makes a random valid move for player 2
	public function makeRandomMove($board,$game)
	{
		$currentPlayer = 'Player 2 (O)';

		//generate random row and column input
		$rowInput = rand(1,3);
		$columnInput = rand(1,3);

		//create a new instance of move and set row, column of move
		$move = new Move;
		$move->setRow($rowInput);
		$move->setColumn($columnInput);

		//check if move is valid
		$move = $board->checkAvailable($move);

		//If move is valid : make move else ask for input again
		if($move->getValid()){
			echo "Player 2 (O) has made a move at Row : ".$rowInput." , Column : ".$columnInput."\n\n";
			return $this->makeMove($board,$move,$game);
		}
		return $this->makeRandomMove($board,$game);
	}
 
}