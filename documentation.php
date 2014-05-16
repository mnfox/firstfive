<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
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
            <li><a href="#"><i class="fa fa-info"></i> How-To Guide</a></li>
            <li><a href="index.html" onClick="restartAll()"><i class="fa fa-refresh"></i> NRP Prompts</a></li>
            <li><a href="patient.php"><i class="fa fa-bar-chart-o"></i> Results</a></li>   
          </ul>
        </div>
      </div>
    </div>

    <!-- other links content panel -->
    <div class="container theme-showcase" role="main">
      <br><br><br>
      <div class="jumbotron">
        <h3>General First Five Information</h3>

        <!-- video -->
<!--         <div class="vid">
          <iframe width="560" height="315" src="//www.youtube.com/embed/Ievz7u_0mkU" allowfullscreen=""></iframe>
        </div> -->

        <!-- blurb -->
        <h5>The first moments of a baby’s life are crucial, and mostly joyous moments, however what are you meant to do when things don’t go as planned? 
          This is the situation that many pediatric nurses are faced with on a daily basis. In the first five minutes after birth, it’s critical that the right procedures 
          are followed. Ensuring that these procedures are meticulously timed and correctly interpreted is of the utmost importance, and there is really no margin for error. 
          First Five is an app intended to streamline this process for pediatric nurses, and help them save lives.
        </h5>

        <!-- tech details download link -->
        <form method="get" action="designandtech.pdf">
          <div class="col-md-4 col-md-offset-4">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Technical Documentation</button>
            </a>
          </div>
        </form>
      </div>
    </div> 

    <!-- NRP prompts insturctions -->
    <div class="container theme-showcase" role="main">
      <br><br><br>
      <div class="jumbotron">
        <h3>How-To: NRP Prompts</h3>
        <img src="assets/guide1.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>This screen is the landing screen of the app, and also where most of your interaction will be. Thankfully, it is very simple to use! 
          To navigate through the prompts, simply select 'yes' or 'no' depending on which option suits the patient's signs.</h5>
        <h5>The other option you have on this page is to play/pause the timer, or restart the whole NRP. To do this simply press the 'play/pause' 
          or 'restart' buttons located on the navigation bar.</h5>
        <br>
        <img src="assets/guide2.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>Eventually, you will reach an outcome. Once you do, you will see a screen like the one above. At this screen you have the option to 
          either restart the NRP prompts, or save this patient's outcome.</h5>
        <br>
        <img src="assets/guide3.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>If you opt to save the patient's outcomes, you will be taken to this screen where you will be given the patient's unique ID.
          If you wish to look up this patient's outcome again later, please record this number.</h5>
      </div> 
    </div>

    <!-- Results Instructions -->
    <div class="container theme-showcase" role="main">
      <br><br><br>
      <div class="jumbotron">
        <h3>How-To: Patient Results</h3>
        <img src="assets/guide4.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>After selecting the results tab of the nagivation bar, you are brought to this page. Here you can retrieve patient outcomes using their
          unique ID's. To do this, simply enter their unique ID in the text field.</h5>
        <br>
        <img src="assets/guide5.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>Once you submit the form above, you will be taken to this page where you can see the patient's outcome, and the time this was reocorded.</h5>
        <br>
        <img src="assets/guide6.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>If, after you submit the above form, you are directed to a page that looks like this, it is because you did not enter a valid numerical input.
          Please select the 'Get More Results' button and try again.</h5>
        <br>
        <img src="assets/guide7.jpg" class="img-thumbnail img-responsive" alt="Responsive image">
        <h5>If, after you submit the above form, you are directed to a page that looks like this, the ID you entered could not be found, or was not valid.
          Please select the 'Get More Results' button and try again.</h5>
      </div> 
    </div>
  </body>
</html>