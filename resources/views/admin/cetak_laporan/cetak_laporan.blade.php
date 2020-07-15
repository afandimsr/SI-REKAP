

@extends("../layouts/app")
@section('title',"Cetak Laporan")
@section('content')
<div class="cetak-margin">
    <div class="container">
        <table border="0" width="100%">
          <thead>
            <th width="20%">
              <center><img src="dist/img/semarangkota.png" class="img-size-64">
                <br><small>Dinas Pendidikan Kota Semarang</small>
              </center>
            </th>
            <th>
              <center>
                <div class="title-cetak">Laporan Data Pelaporan</div>
                <small> Jl. Dr. Wahidin No.118, Jatingaleh, Kec. Candisari, Kota Semarang, Jawa Tengah 50254</small>
              </center>
            </th>
            <th width="20%">

            </th>
            <th></th>
          </thead>
          <tbody width="100%">

          </tbody>
        </table>
        <br><br>
        <table>
          <tr>
            <td>Periode Pelaporan</td>
            <td width="50%"></td>
            <td></td>
          </tr>
          <tr>
            <td>Dicetak pada</td>
          </tr>

        </table>


        <!-- /.row -->
        <!-- content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">



              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover ">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Pelaporan</th>
                      <th>Nama Pelapor</th>
                      <th>Isi Laporan</th>
                      <th>Sumber Pelaporan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>12 Juni 2020</td>
                      <td>Rudi</td>
                      <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, eius.</td>
                      <td><span class="tag tag-success">Email</span></td>
                      <td>Selesai</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>12 Juni 2020</td>
                      <td>Tangguh</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, ipsam.</td>
                      <td><span class="tag tag-success">Email</span></td>
                      <td>Selesai</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>14 Juni 2020</td>
                      <td>Yuni</td>
                      <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit, dolore.</td>
                      <td><span class="tag tag-success">Website</span></td>
                      <td>Selesai</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>13 Juni 2020</td>
                      <td>Rudi</td>
                      <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. In, doloribus..</td>
                      <td><span class="tag tag-success">Twitter</span></td>
                      <td>Selesai</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- footer -->
        <div class="flexbox-container">
          <div class="content1"></div>
          <div class="content2"></div>
          <div class="content3">Semarang, 28 Juni 2020 <br><br><br><br>Vira Oktavia <br>NIP.</div>
        </div>



      </div>
</div>
@endsection
