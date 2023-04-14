<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assset/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assset/css/login.css" rel="stylesheet">
    <script src="assset/js/jquery-1.11.1.min.js"></script>
    <script src="assset/js/bootstrap.min.js"></script>

</head>
<body>
<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		    <form action="{{ route('login') }}" class="login-form" method="POST">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                    <input name="email" type="text" class="form-control" placeholder="Email">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                    <div class="form-check">
                    <button type="submit" class="btn btn-login float-right">Submit</button>
                </div>
            </form>
        </div>
            <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="assset/img/people-coffee-tea-meeting.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="assset/img/pexels-photo.jpg" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>	   
		</div>
	</div>
</div>
</section>
    
</body>
</html>