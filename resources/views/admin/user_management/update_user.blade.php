@extends('../../layouts.admin')
@section('title', "User Edit")
@section('title_bar',"User Edit")
@section('breadcrum_page2',"User Management")
@section('breadcrum_page',"Edit")
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
                      <img class="profile-user-img img-fluid img-circle" src="{{asset("img/user_profile/".$users['profil']."")}}"
                          alt="User profile picture">
                      </div>

                        <h3 class="profile-username text-center">{{$users['name']}}</h3>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>No hp</b> <a class="float-right">{{$users['no_hp']}}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{$users['email']}}</a>
                        </li>

                      </ul>

                        <form action="{{route('admin.users.update',$users['id'])}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <div class="form-group justify-content-center">
                                <div class="input-group">
                                <input type="file" id="exampleInputFile" class="form-control" name="profile">
                                </div>
                                <div class="input-group mt-1">
                                <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                            </form>



                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-6 ">
                  <div class="card card-info card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3">
                          <h3 class="card-title">Profile</h3>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill"
                            href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home"
                            aria-selected="true">Ubah Password</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill"
                            href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile"
                            aria-selected="false">Ubah Profile</a>
                        </li>

                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                          aria-labelledby="custom-tabs-two-home-tab">
                      <form method="post" action="{{route("admin.users.update",$users['id'])}}">
                        @csrf
                        @method('put')
                            <div class="card-body">
                              <div class="form-group">
                                <label for="password_baru">Password Baru </label>
                                <input type="password" class="form-control" name="password" class="@error('password') is-invalid @enderror" id="password_baru" placeholder="Enter email">
                                @error('password')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" id="confirm_password" placeholder="Password">
                                @error('password_confirmation')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                          aria-labelledby="custom-tabs-two-profile-tab">
                          <form method="post" action="{{route("admin.users.update",$users['id'])}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                              <div class="form-group">
                                <label for="nama">Nama </label>
                              <input type="text" value="{{$users['name']}}" class="form-control @error('password') is-invalid @enderror" name="nama" class="form-control" id="nama" placeholder="Nama">
                                @error('nama')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" value="{{$users['nip']}}" class="form-control @error('password') is-invalid @enderror" class="form-control" name="nip" id="nip" placeholder="nip">
                                @error('nip')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{$users->email}}" class=" form-control @error('password') is-invalid @enderror" class="form-control" name="email" id="email" placeholder="Email">
                                @error('email')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    @foreach ($jabatans as $jabatan)
                                <option value="{{$jabatan['id']}}" {{ ($jabatan['id']==$users['kode_jabatan']) ? "selected" : ''}}>{{$jabatan['nama_jabatan']}}</option>
                                    @endforeach

                                  </select>

                              </div>
                              <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" value="{{$users['no_hp']}}" name="no_hp" class="form-control @error('password') is-invalid @enderror"  id="no_hp" placeholder="No Hp">
                                @error('no_hp')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group ">
                                <label for="role">Role</label>
                                <div class="form-check ml-4">

                                    <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="role1" value="1" {{($users['is_admin']== 1 ? 'checked':'')}}>
                                    <label class="form-check-label" for="role1">
                                      Admin
                                    </label>
                                  </div>
                                  <div class="form-check ml-4">
                                    <input class="form-check-input @error('role') is-invalid @enderror"  type="radio" name="role" id="role2" value="0" {{($users['is_admin']== 0 ? 'checked':'')}}>
                                    <label class="form-check-label" for="role2">
                                      User
                                    </label>
                                  </div>
                                  @error('role')
                                  <div class="alert alert-danger"><small>{{ $message }}</small></div>
                              @enderror
                              </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
