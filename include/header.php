<html lang="en"><head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>GSB 2 Way</title
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

   <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	
	<style>
	body {
	  min-height: 4.5rem;
	  padding-top: 4.5rem;
	}
			
			
		h3 {
		  color: #fff;
		  font-size: 24px;
		  text-align: center;
		  margin-top: 30px;
		  padding-bottom: 30px;
		  border-bottom: 1px solid #eee;
		  margin-bottom: 30px;
		  font-weight: 300;
		}

		.container {
		  max-width: 970px;
		}

		div[class*='col-'] {
		  padding: 0 30px;
		}

		.wrap {
		  box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
		  border-radius: 4px;
		}

		a:focus,
		a:hover,
		a:active {
		  outline: 0;
		  text-decoration: none;
		}

		.panel {
		  border-width: 0 0 1px 0;
		  border-style: solid;
		  border-color: #fff;
		  background: none;
		  box-shadow: none;
		}

		.panel:last-child {
		  border-bottom: none;
		}

		.panel-group > .panel:first-child .panel-heading {
		  border-radius: 4px 4px 0 0;
		}

		.panel-group .panel {
		  border-radius: 0;
		}

		.panel-group .panel + .panel {
		  margin-top: 0;
		}

		.panel-heading {
		  background-color: #190263;
		  border-radius: 0;
		  border: none;
		  color: #fff;
		  padding: 0;
		}

		.panel-title a {
		  display: block;
		  color: #fff;
		  padding: 12px;
		  position: relative;
		  font-size: 14px;
		  font-weight: 400;
		}

		.panel-body {
		  background: #fff;
		}

		.panel:last-child .panel-body {
		  border-radius: 0 0 4px 4px;
		}

		.panel:last-child .panel-heading {
		  border-radius: 0 0 4px 4px;
		  transition: border-radius 0.3s linear 0.2s;
		}

		.panel:last-child .panel-heading.active {
		  border-radius: 0;
		  transition: border-radius linear 0s;
		}
		/* #bs-collapse icon scale option */

		.panel-heading a:before {
		  content: '\e146';
		  position: absolute;
		  font-family: 'Material Icons';
		  right: 5px;
		  top: 10px;
		  font-size: 24px;
		  transition: all 0.5s;
		  transform: scale(1);
		}

		.panel-heading.active a:before {
		  content: ' ';
		  transition: all 0.5s;
		  transform: scale(0);
		}

		#bs-collapse .panel-heading a:after {
		  content: ' ';
		  font-size: 24px;
		  position: absolute;
		  font-family: 'Material Icons';
		  right: 5px;
		  top: 10px;
		  transform: scale(0);
		  transition: all 0.5s;
		}

		#bs-collapse .panel-heading.active a:after {
		  content: '\e909';
		  transform: scale(1);
		  transition: all 0.5s;
		}
		/* #accordion rotate icon option */

		#accordion .panel-heading a:before {
		  content: '\e316';
		  font-size: 24px;
		  position: absolute;
		  font-family: 'Material Icons';
		  right: 5px;
		  top: 6px;
		  transform: rotate(180deg);
		  transition: all 0.5s;
		}

		#accordion .panel-heading.active a:before {
		  transform: rotate(0deg);
		  transition: all 0.5s;
		}

		.card-body{
			font-size:14px;
		}
	
	</style>
</head>
  <body class="bg-light" style="">
    <nav class="navbar navbar-expand-md fixed-top navbar-dark"  style="background-color: #d1006a">
    <a class="navbar-brand" href="#">GSB2Way</a>
    </nav>