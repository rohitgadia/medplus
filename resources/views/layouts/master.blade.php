`<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="A location centric, fully categorized medical app">
    <meta name="author" content="rohitgadia">
    <title>Medplus - Your Hospital finder</title>
	<link type="text/css" href="http://cdn1.rohitag.in/css/bootstrap.css?v=1.0" rel="stylesheet">
	<link type="text/css" href="http://cdn1.rohitag.in/css/index.css?v-1.0" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="http://cdn1.rohitag.in/css/font-awesome-4.1.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css?v=1.0">
  @yield('headlinks')
	</head>
	<body>
	<div class="container">
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><i class="head">MED+</i> - Hospital Finder</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </div>
    <div class="headspace"></div>
    <div class="container">
    @yield('content')
	</div>
  <script type="text/javascript" src="http://cdn1.rohitag.in/js/jquery.js?v=1.0"></script>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:300|Lobster|Indie+Flower' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat|Bree+Serif|Pacifico|Exo:400,300italic,400italic,500' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="http://cdn1.rohitag.in/js/bootstrap.min.js?v=1.0"></script>
  <script type="text/javascript" src="http://cdn1.rohitag.in/js/app.js?v=1.0"></script>
	</body>
  </html>