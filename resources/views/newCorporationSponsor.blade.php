<!DOCTYPE html>
<html lang="en">
<head>
	<title> ADD NEW CORPORATION SPONSOR </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="/css/addingform.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
				Welcome {{session()->get('name') }} , <a class="w3-right" href="/logout">Logout</a> </li>
				 @else
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

				{{-- ** Adding Form ** --}}
                 <div class="container">
				<form method="post" action="{{route('newCorporationSponsor')}}">
					@method('GET')
					<div class="row">
						
				<div class="row">
						<div class="col-25">
							<label> Country :</label>
						</div>
							<div class="col-75">
							<select  name="Country">
                                <option>Palestine</option>
                                <option>Turkey</option>
                                <option>Jordan</option>
                                <option>Eygept</option>
   		                        <option>Syria</option>
   		                        <option>Lebnon</option>
   		                        <option>USA</option>
   		                        <option>Germeny</option>
   		                        <option>China</option>
   		                        <option>Tunisia</option>
   		                        <option>Moroco</option>
   		                        <option>Spain</option>
   		                        <option>Qater</option>
   		                        <option>Kuwait</option>
                               </select>
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Full Name :</label>
						</div>
							<div class="col-75">
							<input type="text" name="FullName">
                 </div>
					</div>	

					<div class="row">
						<div class="col-25">
							<label> Contact Person :</label>
						</div>
							<div class="col-75">
							<input type="text" name="ContactPerson">
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Address :</label>
						</div>
							<div class="col-75">
							<input type="text" name="Address">
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> First Telephone Number :</label>
						</div>
							<div class="col-75">
							<input type="text" name="FirstTel">
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Second Telephone Number :</label>
						</div>
							<div class="col-75">
							<input type="text" name="SecondTel">
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> E-Mail Address :</label>
						</div>
							<div class="col-75">
							<input type="text" name="Email">
                 </div>
					</div>

					
					<div class="row">
    <input type="submit" value="Submit">
  </div>

</div>

</form>

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