<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> The Millionnials </title>

    <!-- local style sheet -->
    <link href="style.css" rel="stylesheet">

</head>


<body class="landingPage">

    <?php include 'navbar.php'; ?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Where your journey to financial independence begins</h1>
        <p class="lead">A one-stop factory for you to learn about financial knowledge and achieve your financial freedom.</p>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Watch Your Money</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Your starting point</li>
                        <li>Bookkeeping</li>
                        <li>Know where you spend</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" onclick="window.location.href='bookkeeping-page.php'">Start Bookkeeping</button>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Safeguard Your Money</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1> -->
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Understand your risk tolerance</li>
                        <li>Scenario Game</li>
                        <li>Financial Planning</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" onclick="window.location.href='scenario_main.php'">Start a Game</button>
                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Grow Your Money</h4>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1> -->
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Trading Simulation</li>
                        <li>Share with your friends</li>
                        <li>Learn and earn</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" onclick="window.location.href='risk_test.php'">Start Simulation</button>
                </div>
            </div>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="img/logo.jpg" alt="" width="140" height="40"> </img>
                    <small class="d-block mb-3 text-muted">&copy; 2020-2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>


    <!-- <div class="container-fluid mt-2">

        <h2> The Millionnials </h2>
    </div>

    <div class="h-100 row align-items-center">
        <div class="container text-center" style="border:1px solid #cecece;">
            
            <div class="row">
                                

                <div class="col-sm-4 bg-color">
                <a class="btn btn-primary" href="bookkeeping-page.php" role=button>Watch Your Money</a>
                    
                </div>
                <div class="col-sm">
                <button type="button" class="btn btn-primary">Safeguard Your Money</button>
                </div>
                <div class="col-sm">
                <button type="button" class="btn btn-primary">Grow Your Money</button>
                </div>
            </div>
        </div>
    </div> -->

</body>

</html>