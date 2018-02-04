<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Incognito</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Departments
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="#">Computing</a> </li>
                        <li> <a href="#">Electrical Engineering</a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">Business</a></li>
                        <li> <a href="#">Accounting</a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">Art</a></li>
                        <li> <a href="#">Music</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Submit Idea</a>
                </li>
                <li>
                    <a href="#">My Idea</a>
                </li>
                <li>
                    <a href="#">Work</a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9 page-header-2">
            <h2>Latest idea</h2>
            <h2>Departments</h2>
        </div>

        <div class="col-xs-12 col-md-3 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search</h3>
                </div>
                <div class="panel-body">
                    <form action="#" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter text here">
                        </div>
                        <input type="submit" class="btn btn-default"></input>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">14</span>
                            Computer upgrade
                        </li>
                        <li class="list-group-item">
                            <span class="badge">90</span>
                            Distance learning
                        </li>
                        <li class="list-group-item">
                            <span class="badge">50</span>
                            Parking improvement
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Popular ideas</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Computer upgrade</h4>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deserunt dolorem dolorem</p>
                        </a>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Distance learning</h4>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deserunt dolorem dolorem</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>