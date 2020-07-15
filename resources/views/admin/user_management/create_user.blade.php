@extends('../../layouts.admin')
@section('title', "Create User")
@section('title_bar',"Create New User")
@section('breadcrum_page2',"User Management")
@section('breadcrum_page',"Add User")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-info card-outline">
                    <div class="card-body box-profile">
                        <form method="post" action="{{route("admin.users.store")}}">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="nama">Nama </label>
                              <input type="text" value="{{ old('nama') }}"  class="form-control @error('nama') is-invalid @enderror" name="nama" class="form-control" id="nama" placeholder="Nama">
                                @error('nama')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" value="{{ old('nip') }}"  class="form-control @error('nip') is-invalid @enderror" class="form-control" name="nip" id="nip" placeholder="nip">
                                @error('nip')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email') }}"  class=" form-control @error('email') is-invalid @enderror" class="form-control" name="email" id="email" placeholder="Email">
                                @error('email')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="Password">
                                @error('password')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control @error('no_hp') is-invalid @enderror" id="jabatan" name="jabatan">
                                    <option value="">Pilih</option>
                                    @foreach ($jabatans as $jabatan)
                                    @if (Request::old('jabatan')==$jabatan['id'])

                                    <option value="{{$jabatan['id']}}" selected>{{$jabatan['nama_jabatan']}}</option>
                                    @else
                                    <option value="{{$jabatan['id']}}" >{{$jabatan['nama_jabatan']}}</option>

                                    @endif
                                    @endforeach

                                  </select>
                                  @error('jabatan')
                                  <div class="alert alert-danger"><small>{{ $message }}</small></div>
                              @enderror
                              </div>
                              <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" value="{{ old('no_hp') }}"  name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"  id="no_hp" placeholder="No Hp">
                                @error('no_hp')
                                    <div class="alert alert-danger"><small>{{ $message }}</small></div>
                                @enderror
                              </div>
                              <div class="form-group ">
                                <label for="role">Role</label>
                                <div class="form-check ml-4">
                                    @if (Request::old('role')=="1")
                                    <input class="form-check-input" checked  type="radio" name="role" id="role1" value="1" >
                                    @else
                                    <input class="form-check-input"  type="radio" name="role" id="role1" value="1" >
                                    @endif
                                    <label class="form-check-label" for="role1">
                                      Admin
                                    </label>
                                  </div>
                                  <div class="form-check ml-4">
                                      @if (Request::old('role')=="0")

                                      <input class="form-check-input" checked type="radio" name="role" id="role2" value="0" >
                                      @else
                                      <input class="form-check-input"  type="radio" name="role" id="role2" value="0" >
                                      @endif
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

                            <div class="card-footer text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javacript_footer')
    <script type="text/javascript">

    </script>
@endsection
