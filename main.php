<?php

require __DIR__ . '/vendor/autoload.php';

use App\Move;
use App\Player;
use App\Board;
use App\Game;

echo "Welcome to Tic Tac Toe\n\n";
echo "What would you like the opponent to be?\n";
echo "1)Human\n";
echo "2)comp\n";
echo "\n";

//take input from user for opponent
$inp = readline("Enter Number (1 or 2): ");

//verify user input
while(($inp!='1')&&($inp!='2')){
	echo "Invalid Input!\n";
	//take input from user for opponent
	$inp = readline("Enter Number (1 or 2): ");
}

//set opponent for user (Player 1 - X)
$opponent = ($inp=='1') ? 'human' : 'comp';

echo "\n----- New Game Started -----\n\n";


$game = new Game();
$board = new Board();
$board->display();
$player1 = new Player();
$player1->setPlayerMark('X');
$player2 = new Player();
$player2->setPlayerMark('O');

//As a player you get to play first
do {
	//ask player 1 for move inputs
	$player1->askInputForMove($board,$game);
	//check if the game is over, if not then player 2 makes move
	if(!$game->getGameOver()){
		if($opponent=='human'){
			$player2->askInputForMove($board,$game);
		}else{
			echo "Computer is thinking......\n";
			// thread delay of 1 sec
			sleep(1);
			$player2->makeRandomMove($board,$game);
		}
	}

} while (!$game->getGameOver());

//check win or tie
if($game->getWinner()=='X'){
	echo "Player 1 (X) won"."\n\n";
}elseif ($game->getWinner()=='O') {
	echo "Player 2 (O) won"."\n\n";
}else{
	echo "Draw"."\n\n";
}

echo "----- GAME OVER -----\n\n";
echo "----- Thank you for playing -----\n\n";
