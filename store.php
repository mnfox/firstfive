<?php

    // start session
	session_start();

    // get form data, no need to validate bc not user generated
	$outcome = $_POST['outcome'];

    // connect to db
	$con = mysqli_connect("localhost", "thequ645_ff", "-?=DF.Bx}Dv&", "thequ645_firstfive");

    // check connection
    if (mysqli_connect_errno()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // insert new data into db
    $query = mysqli_query($con, "INSERT INTO patient (id, depth, time) VALUES ('', '$outcome', DEFAULT)");

    // get last row inserted
    $getid = mysqli_query($con, "SELECT * FROM  patient WHERE id = (SELECT MAX(id)  FROM patient)");

    // convert this to array
    $row = mysqli_fetch_array($getid);

    // last added patient id
    $_SESSION['newid'] = $row['id'];

    // close connection to db
    mysqli_close($con);

    // redirect to save page
	header('Location: saved.php');
?>