@extends('../../layouts/admin')
@section('title',"Detail Pelaporan")
@section('title_bar',"Detail Pelaporan")
@section('breadcrum_page',"Detail Pelaporan")
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row ml-3 mr-3 ">
        <div class="col-md-12">
            <form action="{{route("admin.pelaporan.edit",$pelaporan['id'])}}" method="get" >
                @csrf
                <div class="card card-info card-outline ">
                    <div class="card-header">
                    <h3 class="card-title">Detail Pelaporan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body ">
                         <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal Pelaporan</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" disabled value="{{$pelaporan['tanggal_pelaporan']}}" class="form-control datetimepicker-input @error('tanggal_pelaporan') is-invalid @enderror"  name="tanggal_pelaporan" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('tanggal_pelaporan')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_pelapor">Nama Pelapor</label>
                        <input type="text" disabled value="{{$pelaporan['nama_pelapor']}}" name="nama_pelapor" id="nama_pelapor"  class="form-control @error('nama_pelapor') is-invalid @enderror">
                            @error('nama_pelapor')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="isi_laporan">Isi Laporan</label>
                            <textarea disabled  class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan" placeholder="{{strip_tags($pelaporan['isi_laporan'])}}" ></textarea>
                              </div>
                              @error('isi_laporan')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select disabled id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="Belum Diproses" {{($pelaporan['status_laporan']=="Belum Diproses")? 'selected':''}}>Belum Diproses</option>
                                <option value="Diproses" {{($pelaporan['status_laporan']=="Diproses")? 'selected':''}}>Diproses</option>
                                <option value="Selesai" {{($pelaporan['status_laporan']=="Selesai")? 'selected':''}}>Selesai</option>
                              </select>
                              @error('status')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                         <!-- Date -->
                         <div class="form-group hide_depend" id="tanggal_penyelesaian" >
                            <label for="tanggal_penyelesaian">Tanggal Penyelesaian</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" disabled value="{{$pelaporan['tanggal_penyelesaian']}}" id="tanggal_penyelesaian" class="form-control datetimepicker-input @error('tanggal_penyelesaian') is-invalid @enderror" name="tanggal_penyelesaian" data-target="#reservationdate2"/>
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('tanggal_penyelesaian')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group hide_depend" id="respons">
                            <div class="mb-3">
                                <label for="respons">Respons</label>
                            <textarea disabled class="form-control @error('respons') is-invalid @enderror"  id="respons" name="respons" placeholder="{{strip_tags($pelaporan['respons'])}}" ></textarea>
                              </div>
                              @error("respons")
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi">Nama Instansi</label>
                        <input type="text" disabled value="{{$pelaporan['nama_instansi']}}" name="nama_instansi" id="nama_instansi" class="form-control @error('nama_instansi') is-invalid @enderror">
                            @error('nama_instansi')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="sumber_pelaporan">Sumber Pelaporan</label>
                            <select disabled id="sumber_pelaporan" name="sumber_pelaporan" class="form-control @error('sumber_pelaporan') is-invalid @enderror">
                                @foreach ($sumber_pelaporans as $sumber_pelaporan)

                            <option value="{{$sumber_pelaporan['id']}}" {{($sumber_pelaporan['sumber_pelaporan']==$pelaporan['sumber_pelaporan'])? 'selected':''}}>{{$sumber_pelaporan['sumber_pelaporan']}}</option>
                                @endforeach

                              </select>
                              @error('sumber_pelaporan')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>

                        <div class="form-group ">
                         <center><a href="{{route('admin.pelaporan.index')}}" class="btn btn-warning "><i class="fa fa-arrow-left"></i> Kembali </a> <button type="submit" class="btn btn-success "><i class="fa fa-edit"></i> Ubah </button></center>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </form>
    </div>
    </div>
</div>
@endsection

@section('javascript_footer')
<script type="text/javascript">
$(function() {



});
</script>
@endsection
