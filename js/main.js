// default of 30 seconds
var count = 31.00; 

// time for a short prompt
var shortTime = 31.00;

// time for a long prompt
var longTime = 61.00;

// counter to orient the program as to how far along we are
var NRPDepth = 0; 

//1000 will run it every 1 second
var counter = setInterval(timer, 1000); 

// variable to keep track of whether the program is paused or not
var paused = 0; 

// boolean to keep track of which buttons are showing
var buttonState = false;

// variable to store the text that appears as the outcome
var outcomeText = ""; 

// main timer function
function timer() 
{
    // decrease timer counter by 1 every second...
    count = count - 1;

    // until timer reaches 0          
    if (count <= 0) 
    {
        // stop the timer           
        clearInterval(counter); 

        // send alert
        alert("Too much time has passed. Seek medical attention!"); 

        // finish
        return;
    }

    // display the timer's number of seconds remaining
    document.getElementById("timer").innerHTML = count + "s"; 
}

// update instructions for current prompts
function updateInstruction(newInstruction) 
{
    document.getElementsByTagName("p")[1].innerHTML = newInstruction;
    outcomeText = newInstruction;
}

// update current prompt
function updatePrompt(newPrompt) 
{
    document.getElementsByTagName("p")[0].innerHTML = newPrompt;
}


// update current prompt's title
function updateTitle(newTitle) 
{
    document.getElementsByTagName("h1")[0].innerHTML = newTitle;
}

// resets timer by amount specified
function resetTimer(amount)
{
    clearInterval(counter);
    count = amount;
    counter = setInterval(timer, 1000);
    timer();
}

/*  swaps the buttons so green-check is always a positive response (positive as in positive health outcome, and 
*   red-x is always a negative response (negative as in a non-optimal health outcome),
*   regardless of 'yes' or 'no' text
*/
function swapButtons() 
{
    if (buttonState) 
    {
        document.getElementsByTagName("td")[1].innerHTML = "<a href='#' class='btn btn-success btn-lg' role='button' onclick='yes()'><i class='fa fa-check-circle'></i> Yes</a>";
        document.getElementsByTagName("td")[2].innerHTML = "<a href='#' class='btn btn-danger btn-lg' role='button' onclick='no()'><i class='fa fa-times-circle'></i> No</a>";
        buttonState = !buttonState;
    } 
    else if (!buttonState) 
    {
        document.getElementsByTagName("td")[1].innerHTML = "<a href='#' class='btn btn-success btn-lg' role='button' onclick='no()'><i class='fa fa-check-circle'></i> No</a>";
        document.getElementsByTagName("td")[2].innerHTML = "<a href='#' class='btn btn-danger btn-lg' role='button' onclick='yes()'><i class='fa fa-times-circle'></i> Yes</a>";
        buttonState = !buttonState;
    }
}

// removes yes/no button and dispalys restart/save buttons
function removeButtons() 
{
    document.getElementsByTagName("td")[0].innerHTML = "<a href='#' class='btn btn-primary btn-lg' role='button' onclick='restartAll()'><i class='fa fa-repeat'></i> Restart</a><br><br><form action='store.php' method='post'><input type='hidden' name='outcome' value='" + outcomeText + "'><button type='submit' class='btn btn-primary btn-lg'><i class='fa fa-save'></i> Save Results</button></form>";  
    document.getElementsByTagName("td")[1].innerHTML = "";
    document.getElementsByTagName("td")[2].innerHTML = "";
}

// traverses through the NRP 
function shiftDepth(shiftBy)
{
    if (shiftBy === "plusOne")
    {
        NRPDepth = NRPDepth + 1;
    }
    if (shiftBy === "plusTwo")
    {
        NRPDepth = NRPDepth + 2;
    }
    if (shiftBy === "minusOne")
    {
        NRPDepth = NRPDepth - 1;
    }
}

// called when the user has completed the NRP - timer stops at this time.
function finish() 
{
    clearInterval(counter);
    document.getElementsByTagName("p")[0].innerHTML = "";
    document.getElementsByTagName("p")[1].innerHTML = "Okay, looks good - continue monitoring.";
    removeButtons();
}

// resumes the program wherever the user left off
function playTimer() 
{
    counter = setInterval(timer, 1000);
    timer();
}

// pauses the program
function pauseTimer() 
{
    if (paused === 0) 
    {
        clearInterval(counter);
        paused = 1;
    } 
    else if (paused === 1) 
    {
        playTimer();
        paused = 0;
    }
}

// updates final prompt and instructions
function finalPrompt(finishType)
{
    if (finishType === "good")
    {
        updateTitle("Okay, Good!");
        updateInstruction("Routine care; provide warmth; clear airway if necessary; dry; ongoing evaluation");
    }
    else if (finishType === "warning")
    {
        updateTitle("Requires specialised care.");
        updateInstruction("Please consult a specialist.");
    }
    else
    {
        updateTitle("Clear Airway; SPO<sub>2</sub> monitoring; consider CPAP.");
        updateInstruction("Gradually decrease PPV, move baby for post-recucitation care.");
    }

    pauseTimer();
    removeButtons();
}

// reloads the page, effectively restarting the program.
function restartAll() 
{
    window.location.reload(true);
}

/*  if user clicks 'yes', change the current view according to previous state.
*   consult NRP flow chart in documentaiton for more details
*/
function yes() 
{

    if (NRPDepth === 0) 
    {
        finalPrompt("good");
    } 
    else if (NRPDepth === 1) 
    {
        finalPrompt("warning");
    } 
    else if (NRPDepth === 3) 
    {
        finalPrompt("alt");
    } 
    else if (NRPDepth === 2) 
    {
        shiftDepth("plusTwo");
        updateTitle("PPV, SPO<sub>2</sub> monitoring");
        updateInstruction("");
        updatePrompt("HR Below 100bpm?");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 4) 
    {
        shiftDepth("plusOne");
        updateTitle("Take ventilation corrective steps.");
        updateInstruction("");
        updatePrompt("HR Below 60bpm?");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 5) 
    {
        shiftDepth("plusTwo");
        resetTimer(longTime);
        updateTitle("Consider intubation; Chest Compressions.");
        updateInstruction("Coordinate with PPV (40-60bpm). (1 minute = 90 compressions + 30 breaths) 'One-and-Two-and-Three-and-Breath-and'");
        updatePrompt("HR below 60bpm?");
    } 
    else if (NRPDepth === 6) 
    {
        shiftDepth("minusOne");
        updateTitle("Take ventilation corrective steps.");
        updateInstruction("");
        updatePrompt("HR Below 60bpm?");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 7) 
    {
        shiftDepth("plusOne");
        resetTimer(longTime);
        updateTitle("Initiate umbilical IV access");
        updateInstruction("IV Epinephrine (1:10,000) continue PPV (O<sub>2</sub> @ 100%) + chest compressions");
        updatePrompt("HR still below 60bpm?");
    } 
    else if (NRPDepth === 8) 
    {
        shiftDepth("plusOne");
        resetTimer(shortTime);
        updateTitle("Repeat dose every 3-5 minutes");
        updateInstruction("Continue PPV, (0<sub>2</sub> @100% + Chest compressions");
        updatePrompt("HR still below 60bpm again?");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 9) 
    {
        shiftDepth("plusOne");
        resetTimer(shortTime);
        updateTitle("Consider hypovolemia or pneumothorax");
        updateInstruction("Oxymeter; Stop chest compressions when HR >60");
        updatePrompt("HR still below 60bpm again?");
    } 
    else if (NRPDepth === 10) 
    {
        finalPrompt("warning");
    }
}

/*  if user clicks 'no', change the current view according to previous state.
*   consult NRP flow chart in documentaiton for more details
*/
function no() 
{

    if (NRPDepth === 0) 
    {
        shiftDepth("plusOne");
        swapButtons();
        updateTitle("Is meconium present?");
        updatePrompt("");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 1) 
    {
        shiftDepth("plusOne");
        updateTitle("Warm; dry; stimulate.");
        updateInstruction("Clear airway if necessary.");
        updatePrompt("HR below 100bpm, gasping, or apnea?");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 2) 
    {
        shiftDepth("plusOne");
        updateInstruction("");
        updatePrompt("");
        updateTitle("Laboured breathing, or persistent cyanosis?");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 3) 
    {
        finalPrompt("good");
    } 
    else if (NRPDepth === 4) 
    {
        finalPrompt("alt");
    } 
    else if (NRPDepth === 5) 
    {
        shiftDepth("plusOne");
        updateTitle("HR below 100bpm?");
        updateInstruction("");
        updatePrompt("");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 6) 
    {
        finalPrompt("alt");
    } 
    else if (NRPDepth === 7) 
    {
        shiftDepth("minusOne");
        updateTitle("HR below 100bpm?");
        updateInstruction("");
        updatePrompt("");
        resetTimer(shortTime);
    } 
    else if (NRPDepth === 8) 
    {
        finalPrompt("alt");
    } 
    else if (NRPDepth === 9) 
    {
        finalPrompt("alt");
    }
}