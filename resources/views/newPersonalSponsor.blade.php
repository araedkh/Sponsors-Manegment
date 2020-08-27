<!DOCTYPE html>
<html lang="en">
<head>
	<title> ADD NEW PERSONAL SPONSOR </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<link rel="stylesheet" href="/css/main.css">
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
				<form method="post" action="{{route('newPersonalSponsor')}}">
					@method('GET')
					<div class="row">
						<div class="col-25">
							<label> ID Card Type :</label>
						</div>
							<div class="col-75">
							<input type="radio" name="IdCard"><label>ID</label>
                            <input type="radio" name="IdCard"><label>Passport</label>
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> ID Card Number :</label>
						</div>
							<div class="col-75">
							<input type="text" name="IdCardNumber">
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
							<label> Governorate :</label>
						</div>
							<div class="col-75">
							<select  name="Gov">
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
							<label> City :</label>
						</div>
							<div class="col-75">
							<select name="City">
                                  <option>Gaza</option>
   		                          <option>Rafah</option>
   		                          <option>Yafa</option>
   		                          <option>AlQuds</option>
   		                          <option>Hebron</option>
   		                          <option>Akka</option>
   		                          <option>Haifa</option>
   		                          <option>Nablus</option>
   		                          <option>Ramallah</option>
   		                          <option>Jenen</option>
   		                          <option>khanyouns</option>
   		                          <option>Ariha</option>
   		                          <option>Safad</option>
                               </select>
                 </div>
					</div>	


					<div class="row">
						<div class="col-25">
							<label> District :</label>
						</div>
							<div class="col-75">
							<select name="Dist">
                                  <option>Rimal District</option>
   		                          <option>Sheikh Radwan District</option>
   		                          <option>Al-Zaytoun District </option>
   		                          <option>Al-Shujaiya District </option>
   		                          <option>Hebron District</option>
   		                          <option>Akka District</option>
   		                          <option>Haifa District</option>
   		                          <option>Nablus District</option>
   		                          <option>Ramallah District</option>
   		                          <option>Jenen District</option>
   		                          <option>khanyouns District</option>
   		                          <option>Ariha District</option>
   		                          <option>Safad District</option>
                               </select>
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Address Detailes :</label>
						</div>
							<div class="col-75">
							<input type="text" name="AddressDetails">
                 </div>
					</div>	

					<div class="row">
						<div class="col-25">
							<label> Telephon Number :</label>
						</div>
							<div class="col-75">
							<input type="text" name="Tel">
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Mobile Number :</label>
						</div>
							<div class="col-75">
							<input type="text" name="Mobile">
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
						<div class="col-25">
							<label> Nationality :</label>
						</div>
							<div class="col-75">
							<select name="Nationality">
                                  <option>Palestinian</option>
   		                          <option>Egyptian</option>
   		                          <option>Jordanian </option>
   		                          <option>Turki </option>
   		                          <option>Kuwaiti</option>
   		                          <option>Qatri</option>
   		                          <option>Moroccan</option>
   		                          <option>Tunisian</option>
   		                          <option>Syrian</option>
   		                          <option>Lebanese</option>
   		                          <option>Palestinian</option>
   		                          <option>Palestinian</option>
   		                          <option>Palestinian</option>
                               </select>
                 </div>
					</div>

					<div class="row">
						<div class="col-25">
							<label> Country Of Residence :</label>
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