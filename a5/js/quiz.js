/* 
 * Name: Vishal Thumar
 * Student ID: 000765604
 * This is the javascript page for the quiz, which is used to process the quiz with logics to display the output.
 */
/**
 * this function is for making document.getElementById short.
 * @param {type} inside
 * @return document.getElementById
 */
function get(inside) {
    return document.getElementById(inside);
}
//array for questions
var questions = ["What is the extension of a JavaScript File?", "What number does this program return?<br>var j;<br>for(var i=0;i<3;i++){<br>j++;<br>}return j;", "What are the extensions of a HTML File?", "HTML stands for?", "Cascading Style Sheets are known as _______ . "];
//variable to count score
var count = 0;
//array for options
var options = [["<input type='radio' name='radio' value='0'>.js", "<input type='radio' name='radio' value='1'>.java", "<input type='radio' name='radio' value='1'>.javascript", "<input type='radio' name='radio' value='.script'>.script"],
    ["<input type='number' id='text' >"],
    ["<input type='checkbox' name='check' value='1'>.htl", "<input type='checkbox' name='check' value='0'>.html", "<input type='checkbox' name='check' value='1'>.https", "<input type='checkbox' name='check' value='0'>.htm"],
    ["<input type='radio' name='radio' value='0'>Hyper Text Markup Language", "<input type='radio' name='radio' value='1'>High Text Markup Language", "<input type='radio' name='radio' value='1'>Hyper Tabular Markup Language", "<input type='radio' name='radio' value='1'>None of these"],
    ["<input type='text' id='text'  >"]];
//array for answers
var answers = ["0", "3", "0", "0", "css", "CSS", "Css"];
//variable to change the question in array
var ii = 0;
/**
 * this is the show() function to show/display the questions, options, buttons and outputs.
 * @return output of the program
 */
function show() {
    get("status").innerHTML = "Question no.- " + (ii + 1) + " out of " + questions.length + " questions."; //status for the question number
    get('replay').style.visibility = 'hidden'; // replay button is hidden until quiz ends
    get('next').style.visibility = 'hidden'; // next question button is hidden until current question is submitted
    get('submit').style.visibility = 'visible'; // submit button is visible to submit the answer
    get("p").innerHTML = ""; // currect or incorrect comments off upon new question display
    get("question").innerHTML = questions[ii]; // display the question
    
    //display the options as per the question
    if (ii === 0 || ii === 2 || ii === 3) {

        for (var i = 0; i < options[ii].length; i++) {
            if (i === 0) {
                get("answer").innerHTML = options[ii][i] + "<br>";
            }
            if (i > 0) {
                get("answer").innerHTML += options[ii][i] + "<br>";
            }
        }
    } else if (ii === 1 || ii === 4) {
        get("answer").innerHTML = options[ii] + "<br>";
        if (ii === 4) {
            get('next').innerHTML = "See Score";
        }
    } else {
        //show the score when quiz is finized
        var score;
        if (count === 0) {
            score = "Failure";
        } else if (count === 1) {
            score = "Satisfactory";
        } else if (count === 2) {
            score = "Average";
        } else if (count === 3) {
            score = "Good";
        } else if (count === 4) {
            score = "Very good";
        } else {
            score = "Excellent";
        }
        get('replay').style.visibility = 'visible'; //replay button is visible upon quiz ends
        get('submit').style.visibility = 'hidden'; // submit button is hidden upon game ends
        get("question").innerHTML = "You got " + count + " correct from " + questions.length; //show the currect answers score
        get("answer").innerHTML = ""; //option field is empty upon game ends
        get("status").innerHTML = score + " performance."; //show the performance as per the score
    }


}
/***
 * this is the process() function to calculate the score and check if the answers are correct or not
 * @return answers
 */
function process() {
    var choice; //choice of the user to check the answer
    get('submit').style.visibility = 'hidden'; //submit button is hidden when user submitted the answer
    get('next').style.visibility = 'visible'; // next question button is available when user submitted the answer
    //get user choice by name
    if (ii === 0 || ii === 3) {
        var choices = document.getElementsByName("radio");
        for (var i = 0; i < choices.length; i++) {
            if (choices[i].checked) {
                choice = choices[i].value;
            }
        }
        // checks if answer matches the correct choice
        if (choice === answers[ii]) {
            //each time there is a correct answer count increases
            count++;
            get("p").innerHTML = "Correct Answer"; //comment for correct answer
        } else {
            get("p").innerHTML = "Incorrect. Correct Answer is .js"; //if answer is incorrect, show the correct answer to the user.
        }
        
    } 
    //get user choice by name
    else if (ii === 2) {
        var choices = document.getElementsByName("check");
        var temp = 0;
        for (var i = 0; i < choices.length; i++) {
            if (choices[i].checked) {
                choice = choices[i].value;
                // checks if answer matches the correct choice
                if (choice === answers[ii]) {
                    //each time there is a correct answer count increases
                    count += 0.5;
                    temp++;

                } else if (choice !== answers[ii] && temp !== 0) {
                    //each time when user select incorrect answer with a correct answer count decreases
                    count -= 0.25;
                    temp -= 0.25;

                }
            }
        }
        if (temp === 2) {
            get("p").innerHTML = "Correct Answer"; //comment for correct answer
        } else {
            get("p").innerHTML = "Incorrect. Correct Answers are .html and .htm"; //if answer is incorrect, show the correct answer to the user.
        }
    } else if (ii === 1) {
        //get user choice by Id
        var choice = get("text").value;
        // checks if answer matches the correct choice
        if (choice === answers[ii]) {
            count++;
            get("p").innerHTML = "Correct Answer"; //comment for correct answer
        } else {
            get("p").innerHTML = "Incorrect. Correct Answer is " + answers[ii]; //if answer is incorrect, show the correct answer to the user.
        }
    } else if (ii === 4) {
        //get user choice by Id
        var choice = get("text").value;
        // checks if answer matches the correct choice
        if (choice === answers[ii] || choice === answers[ii + 1] || choice === answers[ii + 2]) {
            count++;
            get("p").innerHTML = "Correct Answer"; //comment for correct answer
        } else {
            get("p").innerHTML = "Incorrect. Correct Answer is " + answers[ii]; //if answer is incorrect, show the correct answer to the user.
        }
    }


    // changes to next question
    ii++;

}
/**
 * replay() function to replay the quiz
 * @return replay game
 */
function replay() {
    ii = 0;
    count = 0;
    show();
}
/**
 * 
 * @type eventListener
 */
window.addEventListener("load", show, false);

