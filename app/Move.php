<?php

namespace App;

class Move
{
	private $row; // between 1 and 3
	private $column; //between 1 and 3 on the 3x3 board
	private $isValid; //whether the move is valid or not
 
	//getters and setters for rows and columns
	public function setRow($i)
	{
		$this->row = $i;
	}
 
	public function setColumn($j)
	{
		$this->column = $j;
	}
 
	public function setValid($valid)
	{
		$this->isValid = $valid;
	}
 
	public function getRow()
	{
		return $this->row;
	}
 
	public function getColumn()
	{
		return $this->column;
	}
 
	public function getValid()
	{
		return $this->isValid;
	}
}