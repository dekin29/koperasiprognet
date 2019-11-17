<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}"> 

    <title>Simpanan Anggota</title>
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
    	<h1>Simpanan Anggota</h1><br>
    	<div class="row">
    		<div class="col-3">
    			<form action="{{ route('anggotaSimpanan') }}" method="GET">
       				<div class="form-group">
				    	<select class="form-control" id="idanggota" name="idanggota" required>
				    		<option value="">Masukkan No Anggota</option>
				  			@foreach($anggotas as $value)
				  				<option value="{{ $value->id }}">{{ $value->no_anggota }}</option>
				  			@endforeach
						</select>
    				</div>
    				<button type="submit" class="btn btn-primary">Tampilkan</button>
    			</form>
    		</div>
    	</div><br>
    	<div class="row">
    		<div class="col-3">
    			<table class="table table-bordered table-sm">
					<thead>
					   
					</thead>
					<tbody>
					  @if(!empty($anggotaAktif))
					  <tr>
					  	<th scope="row">No Anggota</th>
					  	<td>{{ $anggotaAktif->no_anggota }}</td>
					  </tr>
					  <tr>
					  	<th scope="row">Nama Anggota</th>
					  	<td>{{ $anggotaAktif->nama }}</td>
					  </tr>
					  <tr>
					  	<th scope="row">Nama User</th>
					  	<td>{{ $anggotaAktif->nama_user }}</td>
					  </tr>
					  @endif
					</tbody>
				</table>
    		</div>
    	</div><br>
    	<div class="row">
    		<table class="table table-striped table-sm">
    			<thead>
				  <tr>
				    <th scope="col">No</th>
				    <th scope="col">Tanggal</th>
				    <th scope="col">Jenis Simpanan</th>
				    <th scope="col">Nominal</th>
				    <th scope="col">Saldo</th>
				  </tr>
				</thead>
				<tbody>
					@php
						$total = 0;
					@endphp
					@foreach($totalSaldo as $key => $value)
						@php
							if($value->jenis_transaksi == 1){
								$total += $value->nominal_transaksi;
							}
							else if($value->jenis_transaksi == 2){
								$total -= $value->nominal_transaksi;
							}
						@endphp
						
					  <tr>
					  	<td>{{ $key + 1 }}</td>
					  	<td>{{ $value->tanggal }}</td>
					  	<td>{{ $value->transaksi }}</td>
					  	<td>{{ $value->nominal_transaksi }}</td>
					  	<td>{{ $total }}</td>
					  </tr>
					@endforeach
				</tbody>
    		</table>
    	</div>
    	<!-- <div class="row">
            <div class="col-md-5 mb-3">
            	<table class="table table-bordered table-sm">
            		<h4>Simpanan</h4>
					<thead>
					  <tr>
					    <th scope="col">Tanggal</th>
					    <th scope="col">Nominal</th>
					  </tr>
					</thead>
					<tbody>
					  @foreach($simpananAnggota as $value)
					  	<tr>
					  		<td>{{ $value->tanggal }}</td>
					  		<td>{{ $value->nominal_transaksi }}</td>
					  	</tr>
					  @endforeach
					  	<tr>
					  		<th scope="row">Total Simpanan</th>
					  		<td>{{ $total_simpanan }}</td>
					  	</tr>
					</tbody>
				</table>
            </div>
            <div class="col-md-1 md-3"></div>
            <div class="col-md-5 mb-3">
            	<h4>Penarikan</h4>
            	<table class="table table-bordered table-sm">
					<thead>
					  <tr>
					    <th scope="col">Tanggal</th>
					    <th scope="col">Nominal</th>
					  </tr>
					</thead>
					<tbody>
					  @foreach($penarikanAnggota as $value)
					  	<tr>
					  		<td>{{ $value->tanggal }}</td>
					  		<td>{{ $value->nominal_transaksi }}</td>
					  	</tr>
					  @endforeach
					  	<tr>
					  		<th scope="row">Total Penarikan</th>
					  		<td>{{ $total_penarikan }}</td>
					  	</tr>
					</tbody>
				</table>
            </div>
    	</div> -->
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('bootstrap/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/select2.js')}}"></script>

    <script type="text/javascript">
    	$("select").select2()
    </script>
  </body>
</html>