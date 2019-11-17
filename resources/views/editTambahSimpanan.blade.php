<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">

    <title>Tambah Simpanan</title>
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
		          			<a class="dropdown-item" href="http://127.0.0.1:8000/tambahSimpanan">Buat Simpanan</a>
		          			<a class="dropdown-item" href="http://127.0.0.1:8000/dataSimpanan">Data Simpanan</a>
		          			<a class="dropdown-item" href="http://127.0.0.1:8000/anggotaSimpanan">Simpanan Anggota</a>
		        		</div>
		      		</li>
		      		
	    		</ul>
		  	</div>
		</nav>
    <div class="container">
    	<h1>Tambah Simpanan</h1>
    	<div class="row">
    		<div class="col-5">
	    		<form action="{{ route('dataSimpanan.update',['id' => $dataSimpanans->id]) }}" method="POST">
	    			{{ csrf_field() }}
	    			{{ method_field('PUT') }}
	    			<div class="form-group">
	    				<label for="InputNoAnggota">No Anggota</label>
	    				<select class="form-control" id="noanggota" name="noanggota" required>
	    					<option value="">Masukkan No Anggota</option>
	  						@foreach($anggotas as $value)
	  							<option value="{{ $value->id }}" @if($value->id==$dataSimpanans->anggota_id) selected="selected" @endif>{{ $value->no_anggota }} - {{ $value->nama }}</option>
	  						@endforeach
						</select>
	    			</div>
	    			<div class="form-group">
	    				<label for="InputTanggal">Tanggal</label>
	    				<input type="date" class="form-control" id="date" name="date" value="{{ $dataSimpanans->tanggal }}" required>
	    			</div>
	    			<div class="form-group">
	    				<label for="JenisSimpananInput">Jenis Simpanan</label>
	    				<select class="form-control" id="jenisTransaksi" name="jenisTransaksi" required>
	  						<option value="">Pilih Jenis Transaksi</option>
	  						@foreach($jenisTransaksis as $value)
	  							<option value="{{ $value->id }}" @if($value->id==$dataSimpanans->jenis_transaksi) selected="selected" @endif>{{ $value->transaksi }}</option>
	  						@endforeach
						</select>
	    			</div>
	    			<div class="form-group">
	    				<label for="InputNominal">Nominal</label>
	    				<input type="text" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal Simpanan" value="{{ $dataSimpanans->nominal_transaksi }}" required>
	    			</div>
	    			<div class="form-group form-check">
    					<input type="checkbox" class="form-check-input" id="exampleCheck1">
    					<label class="form-check-label" for="CheckSimpanan">Apakah anda yakin akan menyimpan?</label>
 					</div>
	    			<button type="submit" class="btn btn-primary">Simpan</button>
	    		</form>
    		</div>
    	</div>
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