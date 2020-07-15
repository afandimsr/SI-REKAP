@extends('../../layouts/admin')
@section('title',"User Management")
@section('title_bar',"User Management")
@section('breadcrum_page',"User Management")
@section('css')
     <!-- DataTables -->
<link rel="stylesheet" href="{{asset("adminLte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("adminLte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("adminLte3/dist/css/style.css")}}">
@endsection
@section('content')

      <div class="container">
        <div class="card">
          <div class="card-header flexbox-container">
            <div class="content1">
                <h3 class="card-title">User Data</h3>
            </div>
            <div class="content2">

            </div>
            <div class="content3">
            <a href="{{route("admin.users.create")}}" class="btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add User</a>
            </div>
          </div>
          @if (Session::has('message'))
          <div class="alert {{Session::get('alert')}} alert-dismissible ml-3 mr-3" id="alertMessageTime">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                @if (Session::get('alert')=="alert-danger")
                <i class="icon fas fa-ban"></i>
                @else
                <i class="icon fas fa-check"></i>
                @endif

            {{ Session::get('message') }}
          </div>
          @endif
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Picture</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{asset("img/user_profile/".$user['profil']."")}}" class="img-size-50"></td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['nip']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['no_hp']}}</td>
                    <td>{{($user['is_admin']==1)? "Admin":"User"}}</td>

                    <td>
                    <a href="{{route("admin.users.edit",$user['id'])}}" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i></a>
                    <Button  class="btn btn-sm btn-danger" id="remove-pelaporan" data-id="{{ $user->id }}" data-action="{{ route('admin.users.destroy',$user->id) }}"><i class="fa fa-trash" ></i></Button>
                    <a href="{{route("admin.users.show",$user['id'])}}" class="btn btn-sm btn-info"> <i class="fa fa-info-circle"></i> </a>
                    </td>
                </tr>
                @endforeach


              </tbody>
              <tfoot>
                <tr>
                    <th>No</th>
                    <th>Picture</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->

@endsection

@section('javascript_footer')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset("adminLte3/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("adminLte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("adminLte3/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("adminLte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script>


    $(function () {


      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    setTimeout(function(){ $("#alertMessageTime").fadeOut("slow"); }, 5000);
    // remove with sweetalert
    $("body").on("click","#remove-pelaporan",function(){
        var current_object = $(this);
        swal({
            title: "Yakin ingin Hapus?",
            text: "Data pelaporan ini akan dihapus dari sistem",
            icon: "error",
            buttons: ["Batal","OK" ],
            dangerMode: true,

        })
        .then((willDelete) => {
            if (willDelete) {
                var action = current_object.attr('data-action');
                        var token = $('meta[name="csrf-token"]').attr('content');
                        var id = current_object.attr('data-id');
                        // const Toast = Swal.mixin({
                        //     toast: true,
                        //     position: 'top-end',
                        //     showConfirmButton: false,
                        //     timer: 5000
                        //     });

                        $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
                        $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
                        $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
                        $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
                        $('body').find('.remove-form').submit();
                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'Berhasil',
                        //     text: "Data Berhasil Dihapus",
                        // })
                        swal({
                            title: "Berhasil",
                            text: "Data Berhasil Dihapus",
                            icon: "success",
                            button: "OK",
                        });
                }
            else {
                swal("Data not delete");
            }
        });
    });
    // create_option
  </script>
@endsection
