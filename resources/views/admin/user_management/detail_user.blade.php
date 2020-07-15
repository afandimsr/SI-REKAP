@extends('../../layouts.admin')
@section('title', "Detail")
@section('title_bar',"User Details")
@section('breadcrum_page2',"Users Detail")
@section('breadcrum_page',"Detail")
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">

            <div class="container-fluid d-flex justify-content-center">
                <div class="col-4 ">
                  <!-- Profile Image -->
                  <div class="card card-info card-outline justify-content-center">
                    <div class="card-body box-profile ">

                      <div class="text-center">
                      <img class="profile-user-img img-fluid img-bordered" src="{{asset("img/user_profile/".$users['profil']."")}}"
                          alt="User profile picture">
                      </div>

                        <h3 class="profile-username text-center">{{$users['name']}}</h3>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-6 ">
                  <div class="card card-info card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" >
                        <li class="pt-2 pb-2 px-3">
                          <h3 class="card-title">Profile</h3>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                          <form method="get" action="{{route("admin.users.edit",$users['id'])}}">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="nama">Nama </label>
                              <input type="text" disabled value="{{$users['name']}}" class="form-control @error('password') is-invalid @enderror" name="nama" class="form-control" id="nama" placeholder="Nama">
                                @error('nama')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" disabled value="{{$users['nip']}}" class="form-control @error('password') is-invalid @enderror" class="form-control" name="nip" id="nip" placeholder="nip">
                                @error('nip')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" disabled value="{{$users->email}}" class=" form-control @error('password') is-invalid @enderror" class="form-control" name="email" id="email" placeholder="Email">
                                @error('email')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    @foreach ($jabatans as $jabatan)
                                <option disabled value="{{$jabatan['id']}}" {{ ($jabatan['id']==$users['kode_jabatan']) ? "selected" : ''}}>{{$jabatan['nama_jabatan']}}</option>
                                    @endforeach

                                  </select>

                              </div>
                              <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" disabled value="{{$users['no_hp']}}" name="no_hp" class="form-control @error('password') is-invalid @enderror"  id="no_hp" placeholder="No Hp">
                                @error('no_hp')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Edit User</button>
                            </div>
                          </form>



                    </div>
                    <!-- /.card -->
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
