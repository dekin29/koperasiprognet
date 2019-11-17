@extends('layout.app')
@section('title', 'Anggota')
@section('konten')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Tasks:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">done</i> Anggota Aktif
                            <div class="ripple-co ntainer"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#nonaktif" data-toggle="tab">
                            <i class="material-icons">clear</i> Anggota Nonaktif
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Input Anggota
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <div class="card-body table-responsive">
                        <table class="table table-hover">
                          <thead class="text-warning">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>No.KTP</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Pendaftar</th>
                            <th>Act</th>
                          </thead>
                          <tbody>
                            @foreach ($dataAnggota as $d)
                              <tr class="odd gradeX">
                                <td>{{$d->no_anggota}}</td>
                                <td>{{$d->nama}}</td> 
                                <td>{{$d->alamat}}</td>
                                <td>{{$d->telepon}}</td>
                                <td>{{$d->noktp}}</td>
                                <td>
                                  @if ($d->kelamin_id==1)
                                    {{'Laki-laki'}}
                                  @else
                                    {{'Perempuan'}}
                                  @endif
                                </td>
                                <td>
                                    @if ($d->status_aktif==1)
                                      {{'Aktif'}}
                                    @else
                                      {{'Nonaktif'}}
                                    @endif       
                                </td>
                                <td>{{$d->nama_user}}</td>
                                <td style="width: 12%">
                                  <form style="float:left;" action="anggota/{{$d->id}}/edit" method="GET">
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button>
                                  </form>
                                  <form style="float:right;" action="anggota/{{$d->id}}" method="post">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-danger" type="submit" name="delete"><i class="fa fa-times fa-fw" onclick="return confirm('Yakin ingin menonaktifkan anggota?')"></i></button>
                                  </form>
                                </td>            
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane" id="nonaktif">
                      <div class="card-body table-responsive">
                        <table class="table table-hover">
                          <thead class="text-warning">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>No.KTP</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Pendaftar</th>
                            <th>Act</th>
                          </thead>
                          <tbody>
                            @foreach ($dataAnggota2 as $d)
                              <tr class="odd gradeX">
                                <td>{{$d->no_anggota}}</td>
                                <td>{{$d->nama}}</td> 
                                <td>{{$d->alamat}}</td>
                                <td>{{$d->telepon}}</td>
                                <td>{{$d->noktp}}</td>
                                <td>
                                  @if ($d->kelamin_id==1)
                                    {{'Laki-laki'}}
                                  @else
                                    {{'Perempuan'}}
                                  @endif
                                </td>
                                <td>
                                    @if ($d->status_aktif==1)
                                      {{'Aktif'}}
                                    @else
                                      {{'Nonaktif'}}
                                    @endif       
                                </td>
                                <td>{{$d->nama_user}}</td>
                                <td style="width: 12%">
                                  <form style="float:left;" action="anggota/{{$d->id}}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-success" type="submit" name="edit"><i class="fa fa-check fa-fw"></i></button>
                                  </form>
{{--                                   <form style="float:right;" action="anggota/{{$d->id}}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-danger" type="submit" name="delete"><i class="fa fa-trash-o fa-fw" onclick="return confirm('Yakin ingin menghapus data?')"></i></button>
                                  </form> --}}
                                </td>            
                              </tr>
                            @endforeach
                          </tbody>
                        </table> 
                      </div>
                    </div>
                    <div class="tab-pane" id="messages">               
                      <form action="anggota" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">               
                          @foreach ($all as $d)
                            @php
                              if (empty($d)) {
                                date_default_timezone_set('Asia/Makassar');
                                $no = date('dmY');
                                $d=1; 
                              } else {
                                date_default_timezone_set('Asia/Makassar');
                                $no = date('dmY');
                                $d=$d->id; 
                            }
                            @endphp
                          @endforeach
                          @php
                            $d=$d+1;
                          @endphp
                           <label for="no_anggota" class="bmd-label-floating">No. Anggota</label>
                           <input type="text" class="form-control" name="no_anggota" required value="@php echo $no;printf('%04u', $d); @endphp" readonly>
                        </div>
                        <div class="form-group">
                           <label for="nama" class="bmd-label-floating">Nama</label>
                           <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                           <label for="alamat" class="bmd-label-floating">Alamat</label>
                           <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                           <label for="telepon" class="bmd-label-floating">Telepon</label>
                           <input type="telp" class="form-control" name="telepon" required onkeypress="return noHuruf(event)">
                        </div>
                        <div class="form-group">
                           <label for="noktp" class="bmd-label-floating">No.KTP</label>
                           <input type="text" class="form-control" name="noktp" required>
                        </div>
                        <label>Jenis Kelamin</label>
                        <div class="form-check form-check-radio">
                          <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="kelamin_id" id="exampleRadios1" value="1"checked>
                              Laki-laki
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                          </label>
                      </div>
                      <div class="form-check form-check-radio">
                          <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="kelamin_id" id="exampleRadios2" value="2">
                              Perempuan
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                          </label>
                      </div>
                      <input type="hidden" class="form-control" name="user_id" required value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
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
@stop