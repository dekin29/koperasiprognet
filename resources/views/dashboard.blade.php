@extends('layout.app')
@section('title', 'Dashboard')
@section('konten')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">User</p>
                  <h3 class="card-title">{{$user}}
                    <small>Aktif</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="/users">Lihat Selengkapnya...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Anggota</p>
                  <h3 class="card-title">{{$anggota}}
                    <small>Aktif</small>
                  </h3>

                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="/anggota">Lihat Selengkapnya...</a>
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
@stop