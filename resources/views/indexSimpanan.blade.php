@extends('layout.app')  
@section('title', 'Anggota')
@section('konten')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Cari Data Anggota</h4>
                  <p class="card-category"> Masukkan no anggota</p>
                </div>
                <div class="card-body">
                    <form action="/simpanan" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                          <label  class="bmd-label-floating">No Anggota</label>
                           <input type="text" class="form-control" name="idanggota" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                      </form>
                </div>
              </div>
            </div>
          </div>
          @if(!empty($anggotaAktif))
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Input Data Transaksi</h4>
                  <p class="card-category"> Masukkan data transaksi</p>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="messages">              
                    <form action="simpanan" method="POST">
                        {{ csrf_field() }} 
                    <input type="hidden" name="anggota_id" value="{{ $anggotaAktif->id }}">
                        <div class="form-group">
                          <label  class="bmd-label-floating">No Anggota</label>
                           <input type="text" class="form-control" name="no_anggota" required value="{{ $anggotaAktif->no_anggota }}" readonly>
                        </div>
                        <div class="form-group">
                          <label  class="bmd-label-floating">Nama</label>
                           <input type="text" class="form-control" name="nama" required value="{{ $anggotaAktif->nama }}" readonly>
                        </div>
                        <div class="form-group">
                           <select name="jenis_transaksi" class="form-control bmd-label-floating">
                              <option disabled selected>Jenis Transaksi</option>
                                <option value="1">Simpanan</option>
                                <option value="2">Penarikan</option>
                           </select>
                        </div>
                          @php
                            date_default_timezone_set('Asia/Makassar');
                            $date = date('Y-m-d H:i:s');
                          @endphp
                           <input type="hidden" name="tanggal" value="@php echo $date; @endphp">
                        <div class="form-group">
                           <label for="nominal_transaksi" class="bmd-label-floating">Nominal</label>
                           <input type="number" class="form-control" name="nominal_transaksi" required>
                        </div>
                      <input type="hidden" class="form-control" name="id_user" required value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List Transaksi</h4>
                  <p class="card-category"> Data transaksi</p>
                </div>
                <div class="card-body">
                  <div class="card-body table-responsive">
                        <table class="table table-hover">
                          <thead class="text-warning">
                            <th>No Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal</th>
                            <th>Jenis Transaksi</th>
                            <th>Nominal</th>
                            <th>Nama User</th>
                            <th>Act</th>
                          </thead>
                          <tbody>
                            @foreach ($dataSimpanan as $d)
                              <tr class="odd gradeX">
                                <td>{{$d->no_anggota}}</td>
                                <td>{{$d->nama_anggota}}</td>
                                <td>{{$d->tanggal}}</td> 
                                <td>{{$d->transaksi}}</td>
                                <td>{{$d->nominal_transaksi}}</td>
                                <td>{{$d->nama_user}}</td>            
                                <td style="width: 12%">
                                  <form style="float:left;" action="simpanan/{{$d->id}}/edit" method="GET">
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button>
                                  </form>
                                  <form style="float:right;" action="simpanan/{{$d->id}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-danger" type="submit" name="delete"><i class="fa fa-trash-o fa-fw" onclick="return confirm('Yakin ingin menghapus data?')"></i></button>
                                  </form>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
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