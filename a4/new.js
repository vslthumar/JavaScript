/* 
 * Name: Vishal Thumar
 * Student ID: 000765604
 * This is the javascript page for the game, which is used to process the game with logics to display the output.
 */
//global variable declarations for scores, rounds, leaers of the rounds and booleans to check the conditions.
var b;
var total;
var score1;
var score2;
var a;
var rounds;
var lead1 = 0;
var lead2 = 0;
/*
 * roll() function rolls the dice, by getting the elements by Ids from html page
 * and calculate the outcomes with conditions.
 */
function roll() {
    var player = document.getElementById('player');
    var die1 = document.getElementById('die1');
    var die2 = document.getElementById('die2');

    var d1 = Math.floor(Math.random() * 6 + 1);
    var d2 = Math.floor(Math.random() * 6 + 1);
    //to play 3 rounds and stops at 4th
    if (a) {
        die1.innerHTML = d1;
        die2.innerHTML = d2;
        if (d1 > d2) {
            total = (d1 * 10) + d2;
        } else {
            total = (d2 * 10) + d1;
        }
        //switches between player 1 and 2
        if (b) {
            player1();
            player.innerHTML = "Player-2";
        } else {
            player2();
            player.innerHTML = "Player-1";
        }
        //displaying winner by checking the score
    } else {
        var winner = document.getElementById('winner');
        winner.innerHTML = "Game Over...";
        if (lead1 > lead2) {
            winner.innerHTML += "Player-1 is a winner.";
        } else if (lead2 > lead1) {
            winner.innerHTML += "Player-2 is a winner.";
        } else {
            winner.innerHTML += "Match tied!!!";
        }
    }
}
/*
 * calculating and desplaying score for player 1
 */
function player1() {
    var score = document.getElementById('score1');
    score1 = total;
    score.innerHTML = total;
    b = false;

}
/*
 * calculating and desplaying score for player 2
 * and also swithes the round and desplay the leader of the round
 */
function player2() {

    var score = document.getElementById('score2');
    score2 = total;
    score.innerHTML = total;
    b = true;
    var lead = document.getElementById('lead');
    //condition for the leader of the round
    if (score1 > score2) {
        lead1++;
        lead.innerHTML = "Player-1 is in the lead in Round-" + rounds;
    } else if (score2 > score1) {
        lead2++;
        lead.innerHTML = "Player-2 is in the lead in Round-" + rounds;
    } else {
        lead.innerHTML = "Score level. Game tied in Round-" + rounds;
    }
    rounds++; //going into the next round of the game
    //stops after round 4
    if (rounds >= 4) {
        a = false;
        roll();
        rounds = 3;
    }
    document.getElementById('rounds').innerHTML = rounds;
}
//reset all the values of the game and restarting the game
function reset() {
    b = true;
    a = true;
    rounds = 1;
    document.getElementById('player').innerHTML = "Player-1";
    document.getElementById('rounds').innerHTML = rounds;
    document.getElementById('die1').innerHTML = 0;
    document.getElementById('die2').innerHTML = 0;
    document.getElementById('score1').innerHTML = 0;
    document.getElementById('score2').innerHTML = 0;
    document.getElementById('lead').innerHTML = "";
    document.getElementById('winner').innerHTML = "";
}