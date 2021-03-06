<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A web-app designed to help Natal Resucitation Care">
    <meta name="author" content="The Quick Brown Fox Inc.">
    <link rel="shortcut icon" href="favicon.png">

    <title>First Five</title>

    <!-- fontawesome link -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Additional styling -->
    <link href="css/style.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

  <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" onClick="restartAll()">First Five</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="documentation.php"><i class="fa fa-info"></i> How-To Guide</a></li>
            <li><a href="index.html" onClick="restartAll()"><i class="fa fa-refresh"></i> NRP Prompts</a></li>
            <li><a href="patient.php"><i class="fa fa-bar-chart-o"></i> Results</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- main content panel -->
    <div class="container theme-showcase" role="main">
      <br><br><br>
      <div class="jumbotron">
        <h1>Saved!</h1>

        <!-- print patient's id -->
        <p id="nrplevel">This patient's ID is: <?php echo $_SESSION['newid']; ?></p>
        <h5>Please take note of this ID if you would like to look up these results again later</h5>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-min.js"></script>
  </body>
</html>