@extends('layout.app')
@section('title', 'Users')
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
                            <i class="material-icons">done</i> Users Aktif
                            <div class="ripple-co ntainer"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#nonaktif" data-toggle="tab">
                            <i class="material-icons">clear</i> Users Nonaktif
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Input Users
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Act</th>
                          </thead>
                          <tbody>
                            @foreach ($dataUsers as $d)
                              <tr class="odd gradeX">
                                <td>{{$d->nik}}</td>
                                <td>{{$d->nama}}</td> 
                                <td>
                                  @if ($d->user_role==1)
                                    {{'Pengelola Simpanan'}}
                                  @elseif ($d->user_role==2)
                                    {{'Pengelola Pinjaman'}}
                                  @elseif ($d->user_role==3)
                                    {{'Admin'}}
                                  @else
                                    {{'No Role'}}
                                  @endif
                                </td>
                                <td style="width: 12%">
                                  <form style="float:left;" action="users/{{$d->id}}/edit" method="GET">
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit fa-fw"></i></button>
                                  </form>
                                  <form style="float:right;" action="users/{{$d->id}}" method="post">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-danger" type="submit" name="delete"><i class="fa fa-times fa-fw" onclick="return confirm('Yakin ingin menonaktifkan user?')"></i></button>
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Act</th>
                          </thead>
                          <tbody>
                            @foreach ($dataUsers2 as $d)
                              <tr class="odd gradeX">
                                <td>{{$d->nik}}</td>
                                <td>{{$d->nama}}</td> 
                                <td>
                                  @if ($d->user_role==1)
                                    {{'Pengelola Simpanan'}}
                                  @elseif ($d->user_role==2)
                                    {{'Pengelola Pinjaman'}}
                                  @elseif ($d->user_role==3)
                                    {{'Admin'}}
                                  @else
                                    {{'No Role'}}
                                  @endif
                                </td>
                                <td style="width: 12%">
                                  <form style="float:left;" action="users/{{$d->id}}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button style="padding: 3px 8px" class="btn btn-success" type="submit" name="edit"><i class="fa fa-check fa-fw"></i></button>
                                  </form>
                                  {{-- <form style="float:right;" action="users/{{$d->id}}" method="post">
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
                      <form action="{{ route('register') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                           <label for="nik" class="bmd-label-floating">NIK</label>
                           <input type="text" class="form-control" name="nik" value="{{ old('nik') }}"required>
                            @if ($errors->has('nik'))
                              <span class="help-block">
                                <strong>{{ $errors->first('nik') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                           <label for="nama" class="bmd-label-floating">Nama</label>
                           <input type="text" class="form-control" name="nama" value="{{ old('nama') }}"required>
                            @if ($errors->has('nama'))
                              <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                           <label for="username" class="bmd-label-floating">Username</label>
                           <input type="text" class="form-control" name="username" value="{{ old('username') }}"required>
                            @if ($errors->has('username'))
                              <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <label for="password" class="bmd-label-floating">Password</label>
                           <input type="password" class="form-control" name="password" value="{{ old('password') }}"required>
                            @if ($errors->has('password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                           <label for="password-confirm" class="bmd-label-floating">Confirm Password</label>
                           <input type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}"required>
                            @if ($errors->has('password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                            <select name="user_role" class="form-control bmd-label-floating" {{ old('user_role') }}"required>
                              <option disabled selected>User Role</option>
                                  <option value="1">Pengelola Simpanan</option>  
                                  <option value="2">Pengelola Pinjaman</option>
                                  <option value="3">Admin</option>
                           </select>
                           
                            @if ($errors->has('user_role'))
                              <span class="help-block">
                                <strong>{{ $errors->first('user_role') }}</strong>
                              </span>
                            @endif
                        </div>                                              
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