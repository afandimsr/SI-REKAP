@extends('layouts.admin')
@section('title','My Profile')
@section('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset("adminLte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset("adminLte3/plugins/toastr/toastr.min.css")}}">
@endsection

@section('title_bar','My Profile')
@section('breadcrum_page','Profile')


@section('content')

<div class="container-fluid d-flex justify-content-center">
    <div class="col-4 ">
      <!-- Profile Image -->
      <div class="card card-info card-outline justify-content-center">
        <div class="card-body box-profile ">

          <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{asset("img/user_profile/".Auth::user()->profil."")}}"
              alt="User profile picture">
          </div>

            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <b>No hp</b> <a class="float-right">{{Auth::user()->no_hp}}</a>
            </li>
            <li class="list-group-item">
            <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
            </li>

          </ul>

            <form action="{{route('admin.myprofile.update')}}"  method="POST" enctype="multipart/form-data">
                @csrf
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
          <form method="post" action="{{route("admin.myprofile.update")}}">
            @csrf
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
              <form method="post" action="{{route("admin.myprofile.update")}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama </label>
                  <input type="text" value="{{Auth::user()->name}}" class="form-control @error('password') is-invalid @enderror" name="nama" class="form-control" id="nama" placeholder="Nama">
                    @error('nama')
                        <div class="alert alert-danger"><small>{{ $message }}</small></div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" value="{{Auth::user()->nip}}" class="form-control @error('password') is-invalid @enderror" class="form-control" name="nip" id="nip" placeholder="nip">
                    @error('nip')
                        <div class="alert alert-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{Auth::user()->email}}" class=" form-control @error('password') is-invalid @enderror" class="form-control" name="email" id="email" placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger"><small>{{ $message }}</small></div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan">
                        @foreach ($jabatans as $jabatan)
                    <option value="{{$jabatan['id']}}" {{ ($jabatan['id']==Auth::user()->kode_jabatan) ? "selected" : ''}}>{{$jabatan['nama_jabatan']}}</option>
                        @endforeach

                      </select>

                  </div>
                  <div class="form-group">
                    <label for="no_hp">No Hp</label>
                    <input type="text" value="{{Auth::user()->no_hp}}" name="no_hp" class="form-control @error('password') is-invalid @enderror"  id="no_hp" placeholder="No Hp">
                    @error('no_hp')
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

@endsection

@section('javascript_footer')
<!-- SweetAlert2 -->
<script src="{{asset("adminLte3/plugins/sweetalert2/sweetalert2.min.js")}}"></script>
<!-- Toastr -->
<script src="{{asset("adminLte3/plugins/toastr/toastr.min.js")}}"></script>
<script>
    $('.swalDefaultSuccess').on("load",function() {
      Toast.fire({
        icon: 'success',
        title: 'Profile image update succesfully'
      })
    });

</script>
@endsection

