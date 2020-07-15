@extends('../../layouts/admin')
@section('title',"Daftar Pelaporan")
@section('title_bar',"Daftar Pelaporan")
@section('breadcrum_page',"Daftar Pelaporan")
@section('css')
     <!-- DataTables -->
<link rel="stylesheet" href="{{asset("adminLte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("adminLte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("adminLte3/dist/css/style.css")}}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('adminLte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('adminLte3/plugins/toastr/toastr.min.css')}}">
@endsection
@section('content')

      <div class="container">
        <div class="card">
          <div class="card-header flexbox-container">
            <div class="content1">
                <h3 class="card-title">Data Pelaporan</h3>


            </div>
            <div class="content2">

            </div>
            <div class="content3">
            <a href="{{route("admin.pelaporan.create")}}" class="btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                  <th>Tanggal Pelaporan</th>
                  <th>Nama Pelapor</th>
                  <th>Isi Laporan</th>
                  <th>Status</th>
                  <th>Nama Instansi</th>
                  <th>Sumber Laporan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pelaporans as $pelaporan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pelaporan['tanggal_pelaporan']}}</td>
                    <td>{{$pelaporan['nama_pelapor']}}</td>
                    <td>{{strip_tags($pelaporan['isi_laporan'])}}</td>
                    <td>@if($pelaporan['status_laporan']=="Belum Diproses")
                    <h2 class="badge badge-danger">{{$pelaporan['status_laporan']}}</h2>
                    @elseif($pelaporan['status_laporan']=="Diproses")
                    <h2 class="badge badge-info">{{$pelaporan['status_laporan']}}</h2>
                   @else
                    <h2 class="badge badge-success">{{$pelaporan['status_laporan']}}</h2>
                    @endif
                    </td>

                    <td>{{$pelaporan['nama_instansi']}}</td>
                    <td>
                        @foreach ($sumber_pelaporans as $sumber_pelaporan)
                            @if ($pelaporan['sumber_pelaporan'] == $sumber_pelaporan['id'] )

                            {{$sumber_pelaporan['sumber_pelaporan']}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if(Auth::user()->is_admin ==1)
                            <a href="{{route("admin.pelaporan.edit",$pelaporan['id'])}}" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i></a>

                            <Button class="btn btn-sm btn-danger " id="remove-pelaporan" data-id="{{ $pelaporan->id }}" data-action="{{ route('admin.pelaporan.destroy',$pelaporan->id) }}" ><i class="fa fa-trash" ></i></Button>
                        @endif
                      <a href="{{route("admin.pelaporan.show",$pelaporan['id'])}}" class="btn btn-sm btn-info"> <i class="fa fa-info-circle"></i> </a>
                    </td>
                </tr>
                @endforeach


              </tbody>
              <tfoot>
                <tr>
                    <th>No</th>
                  <th>Tanggal Pelaporan</th>
                  <th>Nama Pelapor</th>
                  <th>Isi Laporan</th>
                  <th>Status</th>
                  <th>Nama Instansi</th>
                  <th>Sumber Laporan</th>
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

    <script src="{{asset("adminLte3/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("adminLte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("adminLte3/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("adminLte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('adminLte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
    <script src="{{asset('adminLte3/plugins/toastr/toastr.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
$("body").on("click","#remove-pelaporan",function(){
    var current_object = $(this);
    swal({
        title: "Yakin ingin Hapus?",
        text: "Pelaporan ini akan dihapus dari sistem",
        icon: "error",
        buttons: ["Batal","OK" ],
        dangerMode: true,

    })
    .then((willDelete) => {
        if (willDelete) {
            var action = current_object.attr('data-action');
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id = current_object.attr('data-id');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                        });

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


  </script>
@endsection
