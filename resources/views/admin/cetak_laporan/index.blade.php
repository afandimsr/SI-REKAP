@extends("../layouts/admin")
@section('title',"Cetak Laporan")
@section('title_bar',"Cetak Laporan")
@section('breadcrum_page',"Cetak Laporan")
@section('css')
<link rel="stylesheet" href="{{asset('adminLte3/plugins/daterangepicker/daterangepicker.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="row ml-3 mr-3 ">
        <div class="col-md-12">
            <form action="{{route("admin.cetak.index")}}" method="POST" >
                @csrf
                <div class="card card-info card-outline ">
                    <div class="card-header">
                        <h3 class="card-title">Cetak Berdasarkan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body ">
                    <form action="{{route('admin.cetak.laporan')}}" method="post">
                        @csrf
                        <div class="container-fluid ">
                            <div class="col-md-12 d-flex">
                              <form action="" class="col-md-12">
                                <div class="col-md-4">
                                         <!-- Date range -->
                                         <div class="form-group">
                                            <label for="filter_tanggal">Sumber Palaporan</label>
                                            <select id="filter_tanggal" name="filter_tanggal" class="form-control @error('filter_tanggal') is-invalid @enderror">
                                                <option value="">Pilih</option>
                                                @foreach ($filter_tanggals as $key =>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                               @endforeach
                                              </select>
                                              @error('filter_tanggal')
                                              <p class="alert alert-danger mt-2"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                </div>
                                <div class="col-md-2">
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
                                  <!-- /.form-group -->
                                </div>
                                <!-- berdasarkan sumber pelaporan -->
                                <div class="col-md-2">
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
                                  <!-- /.form-group -->
                                </div>
                                <div class="col-md-4 ">
                                  <div class="form-group ">
                                      <button type="submit" class=" btn btn-info " style="margin-top: 31px">Cetak</button>
                                    {{-- <a href="cetak.html" class="btn btn-primary">Submit</a> --}}

                                  </div>
                                </div>
                              </form>
                            </div>
                    </form>

                        </div><!-- /.c ontainer-fluid -->



                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
@section('javascript_footer')
    <script >

    // custome tanggal indonesia
    $('input[name="filter_tanggal"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="filter_tanggal"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  });

  $('input[name="filter_tanggal"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });


    </script>
@endsection

