<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">

    <title>Data Simpanan</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="http://127.0.0.1:8000/index#">Simpanan</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      	<li class="nav-item">
		        	<a class="nav-link" href="http://127.0.0.1:8000/index#">Home</a>
		      	</li>
	      		<li class="nav-item dropdown">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          		Menu
		        	</a>
	        		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          		<a class="dropdown-item" href="http://127.0.0.1:8000/tambahSimpanan">Tambah Simpanan</a>
		          		<a class="dropdown-item" href="http://127.0.0.1:8000/dataSimpanan">Data Simpanan</a>
		          		<a class="dropdown-item" href="http://127.0.0.1:8000/anggotaSimpanan">Simpanan Anggota</a>
		        	</div>
		      	</li>
	    	</ul>
		</div>
	</nav>
    <div class="container">
    	<h1>Data Simpanan</h1>
    	<a href="http://127.0.0.1:8000/tambahSimpanan" class="btn btn-secondary">Tambah</a><br>
    	<table class="table table-striped table-sm">
			<thead>
			  <tr>
			    <th scope="col">No</th>
			    <th scope="col">No Anggota</th>
			    <th scope="col">Nama</th>
			    <th scope="col">Tanggal</th>
			    <th scope="col">Jenis Simpanan</th>
			    <th scope="col">Nominal</th>
			    <th scope="col">User</th>
			  </tr>
			</thead>
			<tbody>
			  @foreach($simpananData as $key => $value)
			    <tr>
			      <td>{{ $key + 1 }}</td>
			      <td>{{ $value->no_anggota }}</td>
			      <td>{{ $value->nama }}</td>
			      <td>{{ $value->tanggal }}</td>
			      <td>{{ $value->transaksi }}</td>
			      <td>{{ $value->nominal_transaksi }}</td>
			      <td>{{ $value->nama_user }}</td>
			    </tr>
			  @endforeach
			</tbody>
		</table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('bootstrap/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  </body>
</html>