<?php

namespace App;

class Board
{
	private $slots = array(); // initializing array for empty board
 
	public function __construct()
	{
		$row1 = array("_", "_", "_");
 
		$row2 = array("_", "_", "_");
 
		$row3 = array("_", "_", "_");
 
		$this->slots[0] = $row1;
 
		$this->slots[1] = $row2;
 
		$this->slots[2] = $row3;
	}

	public function getslots()
	{
		return $this->slots;
	}
 
	//display the board
	public function display()
	{
		echo "\n";

		for($i = 0; $i < 3; $i++)
		{
			for($j = 0; $j < 3; $j++) { 
				echo $this->slots[$i][$j]."\t";
			}
 
			echo "\n\n";
		}

		echo "\n";
	}
 
	//check if a slot is already occupied or not
	public function checkAvailable($move)
	{
		$i = $move->getRow();
		$j = $move->getColumn();
 		
 		//check input row and column
		$validRowColumn = (($i >= 1 && $i <= 3) && ($j >= 1 && $j <= 3));
 		
 		//check if slot is empty
		if($validRowColumn){
			$validCell = ($this->slots[$i - 1][$j - 1] == "_");
		}else{
			$validCell = false;
		} 
 
        $validMove = ($validRowColumn && $validCell); 
 
        $move->setValid($validMove);
 
		return $move;
	}
 
	//marking the slot with 'X' or 'O'
	public function markCell($move, $mark)
	{
		$i = $move->getRow();
		$j = $move->getColumn();
 
		$this->slots[$i - 1][$j - 1] = $mark;
	}
}

