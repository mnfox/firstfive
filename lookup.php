<?php
    
    // tracks which error message is current
    $errorstate = 0;

    // start session
    session_start();

    // validate form submission
    if (empty($_POST["number"]))
    {
         $_SESSION["errormsg"] = "Please enter a valid Patient ID!";
         $errorstate = 1;
    }

    // get form input
    $input = (int)$_POST["number"];

    
    // Create connection
    $con = mysqli_connect("localhost", "thequ645_ff", "-?=DF.Bx}Dv&", "thequ645_firstfive");

    // Check connection
    if (mysqli_connect_errno()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // query db for id matching the form input
    $result = mysqli_query($con,"SELECT * FROM patient WHERE id = $input");

    // turn this into array
    $row = mysqli_fetch_array($result);

    // if there's nothing matching the form input
    if (sizeof($row) === 0)
    {
        // and the user did actually input something
        if ($errorstate === 0)
        {
            $_SESSION['errormsg'] = "Patient ID not found!";
        }
    }
    // if matching id is found
    else
    {
        $_SESSION["errormsg"] = " ";
        $_SESSION['id'] = $row['id'];    
        $_SESSION['depth'] = $row['depth'];
        $_SESSION['time'] = $row['time'];
    }

    // close connection
    mysqli_close($con);

    // redirect to results view page
    header('Location: results.php');
?>
