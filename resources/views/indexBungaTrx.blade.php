@extends('layout.app')  
@section('title', 'Anggota')
@section('konten')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Hitung Bunga</h4>
                  <p class="card-category"> Hitung Bunga Bulanan</p>
                </div>
                <div class="card-body">
                    <form action="/bunga" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                          <div class="row">
                            
                            <div class="col-md-2">
                              <h4 >Bulan</h4>
                              <h4 >Tahun</h4>
                              <h4 >Presentase</h4>
                              <h4 >Status Transaksi</h4>
                            </div>
                            <div class="col-md-4">
                              <h4 >: {{$bulanNow}}</h4>
                              <h4 >: {{$tahunNow}}</h4>
                              <h4 >: 
                                <?php
                                  foreach ($dataMasterBunga as $key) {
                                    echo $key->persentase."%";
                                  }
                                ?>
                              </h4>
                              <h4 >: 
                                <?php
                                  foreach ($cekTransaksiBulan as $key) {
                                    if ($key->total > 0) {
                                      echo "Sudah Melakukan Transaksi Bunga";
                                    }
                                    else{
                                      echo "Belum Melakukan Transaksi Bunga";
                                    }
                                  }
                                ?>
                              </h4> 
                            </div>
                          </div>

                        </div>
                        <?php
                          foreach ($cekTransaksiBulan as $key) {
                            if ($key->total > 0) {
                              
                            }
                            else{
                              echo '<button type="submit" class="btn btn-primary"> Hitung Bunga</button>';
                            }
                          }
                        ?>
                            
                      </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    function noHuruf(evt) {  //validasi gak boleh ada huruf
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;          
        }
</script>
{{-- <script src="{{asset('bootstrap/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/select2.js')}}"></script>

    <script type="text/javascript">
      $("select").select2()
    </script> --}}
@stop