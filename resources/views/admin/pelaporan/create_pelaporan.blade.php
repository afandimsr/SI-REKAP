@extends('../../layouts/admin')
@section('title',"Tambah Pelaporan")
@section('title_bar',"Tambah Pelaporan")
@section('breadcrum_page',"Tambah Pelaporan")
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row ml-3 mr-3 ">
        <div class="col-md-12">
            <form action="{{route("admin.pelaporan.store")}}" method="POST" >
                @csrf
                <div class="card card-info card-outline ">
                    <div class="card-header">
                        <h3 class="card-title">Tambah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body ">

                        <div class="form-group">
                            <label>Tanggal Pelaporan</label>
                            <div class="input-group date" id="tanggalpelaporan" data-target-input="nearest">
                                <input type="text" value="{{ old('tanggal_pelaporan') }}" class="form-control datetimepicker-input @error('tanggal_pelaporan') is-invalid @enderror"  name="tanggal_pelaporan" data-target="#tanggalpelaporan" placeholder="Tanggal penyelesaian"/>
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
                            <input type="text" value="{{ old('nama_pelapor') }}"  name="nama_pelapor" id="nama_pelapor" placeholder="Nama Pelapor"  class="form-control @error('nama_pelapor') is-invalid @enderror">
                            @error('nama_pelapor')
                                <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="isi_laporan">Isi Laporan</label>
                                <textarea class="textarea @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan" placeholder="Deskripsi Laporan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                              </div>
                              <input type="text" hidden value="{{ old('isi_laporan') }}" id="result_old_isi_laporan">
                              @error('isi_laporan')
                                <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="Belum Diproses" selected="selected">Belum Diproses</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                              </select>
                              @error('status')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                         <!-- Date -->
                         <div class="form-group hide_depend" id="tanggal_penyelesaian" >
                            <label for="tanggal_penyelesaian">Tanggal Penyelesaian</label>
                            <div class="input-group date" id="tanggalpenyelesaian" data-target-input="nearest">
                                <input type="text" value="{{ old('tanggal_penyelesaian') }}" placeholder="Tanggal penyelesaian"  class="form-control datetimepicker-input @error('tanggal_penyelesaian') is-invalid @enderror" name="tanggal_penyelesaian" data-target="#tanggalpenyelesaian"/>
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
                                <textarea class="textarea @error('respons') is-invalid @enderror" id="respons" name="respons" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                              </div>
                              <input type="text" hidden value="{{ old('respons') }}" id="result_old_respons">
                              @error("respons")
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi">Nama Instansi</label>
                            <input type="text" value="{{ old('nama_instansi') }}"  name="nama_instansi" placeholder="Nama Instansi" id="nama_instansi" class="form-control @error('nama_instansi') is-invalid @enderror">
                            @error('nama_instansi')
                            <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="sumber_pelaporan">Sumber Palaporan</label>
                            <select id="sumber_pelaporan" name="sumber_pelaporan" class="form-control @error('sumber_palaporan') is-invalid @enderror">
                                <option value="">Pilih</option>
                                @foreach ($sumber_pelaporans as $key =>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                               @endforeach
                              </select>
                              @error('sumber_pelaporan')
                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <center><a href="{{route('admin.pelaporan.index')}}" class="btn btn-warning "><i class="fa fa-arrow-left"></i> Kembali </a> <button type="submit" class="btn btn-info "><i class="fa fa-save"></i> Simpan</button></center>
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
    let result_old_isi_laporan = $("#result_old_isi_laporan").val();
    let result_old_respons = $("#result_old_respons").val();

    $("textarea#isi_alporan").html(result_old_isi_laporan);
    $("textarea#respons").html(result_old_respons);
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
