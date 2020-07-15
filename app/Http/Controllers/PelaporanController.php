<?php

namespace App\Http\Controllers;

use App\Pelaporan;
use App\SumberPelaporan;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaporans =  Pelaporan::all();
        $sumber_pelaporans = SumberPelaporan::all();
        return view("admin.pelaporan.index", compact('pelaporans', 'sumber_pelaporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sumber_pelaporans = SumberPelaporan::pluck('sumber_pelaporan', 'id');

        return view("admin.pelaporan.create_pelaporan", compact('sumber_pelaporans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // die();
        if ($request->input('status') == "Diproses" || $request->input('status') == "Belum Diproses") {
            $request->validate([
                'tanggal_pelaporan' => "required",
                'nama_pelapor' => "required",
                'isi_laporan' => "required",
                'status' => "required",
                'nama_instansi' => "required",
                'sumber_pelaporan' => "required",
            ]);
            // dd($request->all());

            $tempTanggalPeny = $request->input("tanggal_penyelesaian");
            $tempRespons = $request->input("respons");
            $tempTanggalPeny = "";
            $tempRespons = "";

            $pelaporan = Pelaporan::create([
                'kode_user' => auth()->user()->id,
                'tanggal_pelaporan' => $request->input('tanggal_pelaporan'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'isi_laporan' => $request->input('isi_laporan'),
                'status_laporan' => $request->input('status'),
                'tanggal_penyelesaian' => $tempTanggalPeny,
                'respons' => $tempRespons,
                'nama_instansi' => $request->input('nama_instansi'),
                'sumber_pelaporan' => $request->input('sumber_pelaporan'),
            ]);
            $pelaporan->save();
            if ($pelaporan) {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data Tersimpan",
                    "alert" => "alert-success"
                ]);
            } else {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data Tidak Tersimpan",
                    "alert" => "alert-danger"
                ]);
            }
        } else {
            $request->validate([
                'tanggal_pelaporan' => "required",
                'nama_pelapor' => "required",
                'isi_laporan' => "required",
                'status' => "required",
                'tanggal_penyelesaian' => "required",
                'respons' => "required",
                'nama_instansi' => "required",
                'sumber_pelaporan' => "required",
            ]);

            $pelaporan = Pelaporan::create([
                'kode_user' => auth()->user()->id,
                'tanggal_pelaporan' => $request->input('tanggal_pelaporan'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'isi_laporan' => $request->input('isi_laporan'),
                'status_laporan' => $request->input('status'),
                'tanggal_penyelesaian' => $request->input('tanggal_penyelesaian'),
                'respons' => $request->input('respons'),
                'nama_instansi' => $request->input('nama_instansi'),
                'sumber_pelaporan' =>  $request->input('sumber_pelaporan'),
            ]);
            $pelaporan->save();
            if ($pelaporan) {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data Tersimpan",
                    "alert" => "alert-success"
                ]);
            } else {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data Tidak Tersimpan",
                    "alert" => "alert-danger"
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        $sumber_pelaporans = SumberPelaporan::all();
        return view("admin.pelaporan.detail_pelaporan", [
            'pelaporan' => $pelaporan,
            'sumber_pelaporans' => $sumber_pelaporans,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $sumber_pelaporans = SumberPelaporan::all();
        return view("admin.pelaporan.update_pelaporan", compact('pelaporan', 'sumber_pelaporans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->input('status') == "Diproses" || $request->input('status') == "Belum Diproses") {
            $request->validate([
                'tanggal_pelaporan' => "required",
                'nama_pelapor' => "required",
                'isi_laporan' => "required",
                'status' => "required",
                'nama_instansi' => "required",
                'sumber_pelaporan' => "required",
            ]);
            $tempTanggalPeny = $request->input("tanggal_penyelesaian");
            $tempRespons = $request->input("respons");
            $tempTanggalPeny = "";
            $tempRespons = "";
            $pelaporan = Pelaporan::where('id', $id)->update([
                'kode_user' => auth()->user()->id,
                'tanggal_pelaporan' => $request->input('tanggal_pelaporan'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'isi_laporan' => $request->input('isi_laporan'),
                'status_laporan' => $request->input('status'),
                'tanggal_penyelesaian' => $tempTanggalPeny,
                'respons' => $tempRespons,
                'nama_instansi' => $request->input('nama_instansi'),
                'sumber_pelaporan' => $request->input('sumber_pelaporan'),
            ]);
            if ($pelaporan) {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data berhasil diubah ",
                    "alert" => "alert-success",
                ]);
            } else {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data gagal di ubah",
                    "alert" => "alert-danger",
                ]);
            }
        } else {
            $request->validate([
                'tanggal_pelaporan' => "required",
                'nama_pelapor' => "required",
                'isi_laporan' => "required",
                'status' => "required",
                'tanggal_penyelesaian' => "required",
                'respons' => "required",
                'nama_instansi' => "required",
                'sumber_pelaporan' => "required",
            ]);
            $pelaporan = Pelaporan::where('id', $id)->update([
                'kode_user' => auth()->user()->id,
                'tanggal_pelaporan' => $request->input('tanggal_pelaporan'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'isi_laporan' => $request->input('isi_laporan'),
                'status_laporan' => $request->input('status'),
                'tanggal_penyelesaian' => $request->input('tanggal_penyelesaian'),
                'respons' => $request->input('respons'),
                'nama_instansi' => $request->input('nama_instansi'),
                'sumber_pelaporan' => $request->input('sumber_pelaporan'),
            ]);
            if ($pelaporan) {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data berhasil diubah ",
                    "alert" => "alert-success"
                ]);
            } else {
                return redirect()->route('admin.pelaporan.index')->with([
                    "message" => "Data gagal diubah",
                    "alert" => "alert-danger",
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaporan = Pelaporan::destroy($id);
        if ($pelaporan) {
            return redirect('admin/pelaporan')->with([
                'message' => "Data deleted Succesfully",
                'alert' => "alert-success",
            ]);
        } else {
            return redirect('admin/pelaporan')->with([
                'message' => "Data deleted failed",
                'alert' => "alert-danger",
            ]);
        }
    }
}
