<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/addingform.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <title> SHOW SPONSORS </title>
</head>
<body>

	<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">SPONSORS</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID </td>
          <td>ID Card Number</td>
          <td>Name</td>
          <td>Email</td>
          <td>Gov</td>
          <td>City</td>
          <td>Mobile</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($sopns as $spon)
        <tr>
        	<td>{{$spon->id}}</td>
            <td>{{$spon->IdCardNumber}}</td>
            <td>{{$spon->FullName}} {{$contact->last_name}}</td>
            <td>{{$spon->Email}}</td>
            <td>{{$spon->Gov}}</td>
            <td>{{$spon->City}}</td>
            <td>{{$spon->Mobile}}</td>
            <td>
                <a href="{{ route('editSponsor',$spon->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('destroySponsor', $spon->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>

</body>
</html>