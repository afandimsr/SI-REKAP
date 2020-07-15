@extends('../../layouts/admin')
@section('title',"Ubah Pelaporan")
@section('title_bar',"Ubah Pelaporan")
@section('breadcrum_page',"Ubah Pelaporan")
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row ml-3 mr-3 ">
        <div class="col-md-12">
            <form action="{{route("admin.pelaporan.update",$pelaporan['id'])}}" method="POST" >
                @csrf
                @method("put")
                <div class="card card-info card-outline ">
                    <div class="card-header">
                    <h3 class="card-title">Add</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="card-body ">
                         <!-- Date -->
                        <div class="form-group">
                            <label for="tanggalpelaporan">Tanggal Pelaporan</label>
                            <div class="input-group date" id="tanggalpelaporan" data-target-input="nearest">
                            <input type="text" value="{{$pelaporan['tanggal_pelaporan']}}" class="form-control datetimepicker-input @error('tanggal_pelaporan') is-invalid @enderror"  name="tanggal_pelaporan" data-target="#tanggalpelaporan"/>
                                <div class="input-group-append" data-target="#tanggalpelaporan" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('tanggal_pelaporan')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_pelapor">Nama Pelapor</label>
                        <input type="text" value="{{$pelaporan['nama_pelapor']}}" name="nama_pelapor" id="nama_pelapor"  class="form-control @error('nama_pelapor') is-invalid @enderror">
                            @error('nama_pelapor')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="isi_laporan">Isi Laporan</label>
                            <textarea  class="textarea @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <input type="text" hidden  value="{{$pelaporan['isi_laporan']}}" id="result_isi_laporan">
                              </div>
                              @error('isi_laporan')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
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
                            <div class="input-group date" id="tanggalpenyelesaian" data-target-input="nearest">
                            <input type="text" value="{{$pelaporan['tanggal_penyelesaian']}}" id="tanggal_penyelesaian" class="form-control datetimepicker-input @error('tanggal_penyelesaian') is-invalid @enderror" name="tanggal_penyelesaian" data-target="#tanggalpenyelesaian"/>
                                <div class="input-group-append" data-target="#tanggalpenyelesaian" data-toggle="datetimepicker">
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
                            <textarea class="textarea @error('respons') is-invalid @enderror" value="{{$pelaporan['respons']}}" id="respons" name="respons" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            <input type="text" hidden  value="{{$pelaporan['respons']}}" id="result_respons">
                              </div>
                              @error("respons")
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi">Nama Instansi</label>
                        <input type="text" value="{{$pelaporan['nama_instansi']}}" name="nama_instansi" id="nama_instansi" class="form-control @error('nama_instansi') is-invalid @enderror">
                            @error('nama_instansi')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="sumber_pelaporan">Sumber Pelaporan</label>
                            <select  id="sumber_pelaporan" name="sumber_pelaporan" class="form-control @error('sumber_pelaporan') is-invalid @enderror">
                                @foreach ($sumber_pelaporans as $sumber_pelaporan)

                            <option value="{{$sumber_pelaporan['id']}}" {{($sumber_pelaporan['sumber_pelaporan']==$pelaporan['sumber_pelaporan'])? 'selected':''}}>{{$sumber_pelaporan['sumber_pelaporan']}}</option>
                                @endforeach

                              </select>
                              @error('sumber_pelaporan')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                        <div class="form-group ">
                            <center><a href="{{route('admin.pelaporan.index')}}" class="btn btn-warning "><i class="fa fa-arrow-left"></i> Kembali </a> <button type="submit" class="btn btn-info "><i class="fa fa-save"></i> Simpan Perubahan</button></center>
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
    // Summernote
    $(".hide_depend").hide();
    $("#status").change(function() {
        switch($(this).val()){
            case "Selesai":
                $(".hide_depend").hide().parent().find("#tanggal_penyelesaian").show();
                $("#respons").show();
                break;
            case "Belum Diproses":
                $(".hide_depend").hide().parent().find("#tanggal_penyelesaian").hide();
                $(".hide_depend").hide().parent().find("#respons").hide();
                break;
            case "Diproses":
                $(".hide_depend").hide().parent().find("#tanggal_penyelesaian").hide();
                $(".hide_depend").hide().parent().find("#respons").hide();
                break;
        }
    });
    if($("#status").val()=="Selesai"){
        $(".hide_depend").hide().parent().find("#tanggal_penyelesaian").show();
                $("#respons").show();
    }
    let resultLaporan = $("#result_isi_laporan").val();
    let resultRespons = $("#result_respons").val();
    $("textarea#isi_laporan").html(resultLaporan);
    $("textarea#respons").html(resultRespons);
    // Summernote
    $('.textarea').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    })

    //Date range picker
    $('#tanggalpenyelesaian').datetimepicker({
        format: 'DD/MM/YYYY HH:mm a',
        icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
    });
    $('#tanggalpelaporan').datetimepicker({
        format: 'DD/MM/YYYY HH:mm a',
        icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
    });
});
</script>
@endsection
