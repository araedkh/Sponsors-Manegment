<!DOCTYPE html>
<html>
<head>
    <title>SEARCH ABOUT SPONSOR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/addingform.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>
	<div class="container">
		<h1>Here , You Can Search About Any Sponsor </h1>

        <div class="container">
		<form method="GET" action="{{ url('my-search') }}">
			<div class="row">
						<div class="col-25">
							<label> Sponsor Type :</label>
						</div>
							<div class="col-75">
							<input type="radio" name="sponsorType"><label>Personal</label>
                            <input type="radio" name="sponsorType"><label>Corporation</label>
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label>  Name :</label>
						</div>
							<div class="col-75">
							<input type="text" name="Name">
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
							<label> Contact Person :</label>
						</div>
							<div class="col-75">
							<input type="text" name="ContactPerson">
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

	

				<div class="col-md-6">
					<button class="btn btn-success">Search</button>
				</div>
			</div>
		</form>


		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Country</th>
				<th>Address</th>
				<th>Telephone</th>
				<th>#Beneficaires</th>
				<th>Process</th>
			</tr>
			
			<tr>
				<td colspan="7">No records to display.</td>
			</tr>
			
		</table>

		
		<ul class="pagination pagination-sm">
    <li class="page-item"><a class="page-link" href="#">First</a></li>
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    <li class="page-item"><a class="page-link" href="#">Last</a></li>
    
  </ul>

  <script>
$(document).ready(function(){

 fetch_sponsors_data();

 function fetch_sponsors_data(query = '')
 {
  $.ajax({
   url:"{{ route('Search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>


           <div class="col-md-6">
					<a href="{{route('homapage')}}"><button class="btn btn-success">GO TO HOME PAGE</button></a>
				</div>
			</div>
	
</body>
</html>