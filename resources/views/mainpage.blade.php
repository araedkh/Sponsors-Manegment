<!DOCTYPE html>
<html lang="en">
<head>
<title>SPONSOR MANAGEMENT SYSTEM</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

	<ul class="w3-navbar w3-light-grey w3-border">
		
		<strong><li><a href="{{route('homapage')}}">Home</a></li></strong>
		<strong><li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Add New Sponsor
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('newPersonalSponsor')}}">Personal Sponsor</a>
        <a class="dropdown-item" href="{{route('newCorporationSponsor')}}">Corporation Sponsor</a>
        
      </div>
    </li></strong>
        <strong><li><a href="#services">Our Services</a></li></strong>
        <strong><li><a href="#contact">Contact Us</a></li></strong>
	    <strong><li><a href="#about">About Us</a></li></strong>
		<strong><li><a href="{{route('list')}}">List All Sponsor</a></li></strong>
		<strong><li><a href="{{route('Search')}}">Search About Sponsor</a></li></strong>

		{{-- <li><div class="search-container">
    <form action="#">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div></li> --}}
  <br>

		 @if (session()->get('name'))
		<li class="w3-right">
				Welcome {{session()->get('name') }} , <a class="w3-right" href="/logout">Logout</a> </li> @else
		<li class="w3-right"><a class="w3-green" href="#" id="auth"
			onclick="document.getElementById('authentication').style.display='block'">
		SignIn/SignUp</a></li>
			@endif
	</ul>
	<div id="authentication" class="w3-modal">
		<span
			onclick="document.getElementById('authentication').style.display='none'"
			class="w3-closebtn w3-grey w3-hover-red w3-container w3-padding-16 w3-display-topright">X</span>

		<div class="w3-modal-content w3-card-8 w3-animate-zoom"
			style="max-width: 600px">

			<div class="col-md-6 w3-card-8 w3-teal" onclick="openForm('Login')">
				<h3>Sign In</h3>
			</div>
			<div class="col-md-6 w3-card-8 w3-teal"
				onclick="openForm('Register')">
				<h3>Sign Up</h3>
			</div>
			<div style="margin-top: 25px !important;">
				<div id="Login" class="w3-container form">
					<div class="w3-container ">
						<div class="w3-section">
							<br> <br>

							{{-- ** Validation Section ** --}}

							@if (count($errors->login) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->login->all() as $error)
									<P>{{ $error }}</p>
									@endforeach
								</ul>
							</div>
							@endif 

							@if (Session::has('message'))
							<div class="alert alert-warning">{{ Session::get('message') }}</div>
							@endif

							{{-- ** Log in Form ** --}}

							<form action="/login" method="POST">
								{{ csrf_field() }} <input type="hidden" name="redirurl"
									value="{{ $_SERVER['REQUEST_URI'] }}"> <label><b>Username</b></label>
								<input name="username"
									class="w3-input w3-border w3-margin-bottom" type="text"
									placeholder="Enter Username" required> <label><b>Password</b></label>
								<input class="w3-input w3-border w3-margin-bottom"
									name="password" type="password" placeholder="Enter Password"
									required> <input type="submit"
									class="w3-btn w3-btn-block w3-green" value="Login"> <input
									class="w3-check w3-margin-top" type="checkbox"
									checked="checked"> Remember me
							</form>
						</div>

					</div>
					<div class="w3-container w3-border-top w3-padding-16 ">
						<button
							onclick="document.getElementById('authentication').style.display='none'"
							type="button" class="w3-btn w3-red">Cancel</button>
						<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
					</div>
				</div>
			</div>

			{{-- ** Login Validation ** --}}
			<div id="Register" class="w3-container form ">
				<div class="w3-container">
					<div class="w3-section">

						<br> <br> 
						@if (count($errors->register) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->register->all() as $error)
								<P>{{ $error }}</p>
								@endforeach
							</ul>
						</div>
						@endif
						{{-- ** End Of Login Form ** --}}


						{{-- ** Register Form ** --}}


						<form action="/register" method="POST" id="regForm">
							{{ csrf_field() }} <input type="hidden" name="redirurl"
								value="{{ $_SERVER['REQUEST_URI'] }}"> <label><b>Email</b></label>
							<input class="w3-input w3-border w3-margin-bottom" type="text"
								name="email" placeholder="Enter Email"
								value="{{ old('email') }}" required> <label><b>Username</b></label>
							<input class="w3-input w3-border w3-margin-bottom" type="text"
								name="name" placeholder="Enter username" required
								value="{{ old('name') }}"> <label><b>Password</b></label> <input
								class="w3-input w3-border w3-margin-bottom" type="password"
								name="password" required placeholder="Enter Password"> <label><b>Confirm
									Password</b></label> <input
								class="w3-input w3-border w3-margin-bottom" required
								type="password" name="password_confirmation"
								placeholder="Enter Password">
							<button type="submit" class="w3-btn w3-btn-block w3-green">SignUp</button>
						</form>
					</div>
				</div>

				<div class="w3-container w3-border-top w3-padding-16 ">
					<button
						onclick="document.getElementById('authentication').style.display='none'"
						type="button" class="w3-btn w3-red">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	{{-- ** End Of Register Form ** --}}

	{{-- 	** Content Section ** --}}

	{{-- ** Our Services Section ** --}}

						<div class="w3-row-padding w3-center w3-margin-top" id="services">
							<strong><h2 style="color:#808080"> Our Services </h2></strong>
              <div class="w3-third">
                     <div class="w3-card w3-container" style="min-height:460px">
               <h3>Business Management</h3><br>
                   <i class='fas fa-chart-pie' style='font-size:120px' style="font-size:120px"></i>
                 <p>Factory Management</p>
                 <p>Companies Management</p>
                 <p>Project Management</p>
                 <p>Marketing Management</p>
                      </div>
               </div>

                    <div class="w3-third">
                 <div class="w3-card w3-container" style="min-height:460px">
                     <h3>Marketing</h3><br>
                     <i class="fa fa-dollar" style="font-size:120px" style="font-size:120px"></i>
                     <p>Duration may vary</p>
                     <p>Marketing Of Products</p>
                     <p>Marketing Services</p>
                 </div>
              </div>

                  <div class="w3-third">
                   <div class="w3-card w3-container" style="min-height:460px">
                  <h3>Loans</h3><br>
                <i class='fas fa-donate' style='font-size:120px' style="font-size:120px"></i>
                      <p>General Consulting</p>
                     <p>Interest-free loans</p>
                     <p>Project Management</p>
                     <p>Flexibility And Reliability</p>
                  </div>
                     </div>
             </div>


	{{-- ** Contact Us Section ** --}}

	
  <div class="w3-center w3-padding-64" id="contact">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16" style="color:#808080">
    Contact Us</span>
  </div>

  <form class="w3-container" action="#" target="_blank">
    <div class="w3-section">
      <label>Name</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email" required>
    </div>
    <div class="w3-section">
      <label>Subject</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
    </div>
    <div class="w3-section">
      <label>Message</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message" required>
    </div>
    <button type="submit" class="w3-button w3-block w3-black">Send</button>
  </form>

</div>


{{-- ** About Us Section ** --}}


<div class="w3-center w3-padding-64" id="contact">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16" style="color:#808080" 
    id="about">
   About Us</span>
  </div>

						
             <!-- Image of location/map -->
             <div>
    <img src="/images/map.jpg" class="w3-image w3-greyscale" style="width:100%;margin-top:48px">
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by Alaa Raed</p>
</footer>




	<div class="fluid-container"></div>
	<script>	
        openForm("Login");
             function openForm(formName) {
    
    var x = document.getElementsByClassName("form");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(formName).style.display = "block";  
}
</script>
       @if (Session::has('message'))
	    <script>  $('#auth').click(); </script>
	   @endif @if($errors->login->any())
	   <script>  $('#auth').click();</script>
	   @endif @if($errors->register->any())
	   <script>  $('#auth').click(); openForm('Register');</script>
	   @endif

	   
</body>
</html>