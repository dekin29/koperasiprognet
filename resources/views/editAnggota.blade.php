@extends('layout.app')
@section('title', 'Anggota')
@section('konten')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Edit Anggota</h4>
                  <p class="card-category">Isi Data dengan Benar!</p>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="messages">               
                      <form action="/anggota/{{$dataAnggota->id}}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
{{--                         <div class="form-group">
                           <label for="no_anggota" class="bmd-label-floating">No. Anggota</label>
                           <input type="text" class="form-control" name="no_anggota" required value="{{$dataAnggota->no_anggota}}">
                        </div> --}}
                        <div class="form-group">
                           <label for="nama" class="bmd-label-floating">Nama</label>
                           <input type="text" class="form-control" name="nama" required value="{{$dataAnggota->nama}}">
                        </div>
                        <div class="form-group">
                           <label for="alamat" class="bmd-label-floating">Alamat</label>
                           <input type="text" class="form-control" name="alamat" required value="{{$dataAnggota->alamat}}">
                        </div>
                        <div class="form-group">
                           <label for="telepon" class="bmd-label-floating">Telepon</label>
                           <input type="telp" class="form-control" name="telepon" required onkeypress="return noHuruf(event)" value="{{$dataAnggota->telepon}}">
                        </div>
                        <div class="form-group">
                           <label for="noktp" class="bmd-label-floating">No.KTP</label>
                           <input type="text" class="form-control" name="noktp" required value="{{$dataAnggota->noktp}}">
                        </div>
                        <label>Jenis Kelamin</label>
                        @if ($dataAnggota->kelamin_id == '1')
                        <div class="form-check form-check-radio">
                          <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="kelamin_id" id="exampleRadios1" value="1" checked>
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
                        @else
                          <div class="form-check form-check-radio">
                          <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="kelamin_id" id="exampleRadios1" value="1">
                              Laki-laki
                              <span class="circle">
                                  <span class="check"></span>
                              </span>
                          </label>
                        </div>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="kelamin_id" id="exampleRadios2" value="2" checked>
                                Perempuan
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div> 
                        @endif
                        <button type="submit" class="btn btn-primary">Update</button>
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