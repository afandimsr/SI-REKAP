<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SumberPelaporan;
use App\Pelaporan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jabatan;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }
    public function adminHome()
    {
        return view("admin.index");
    }
    public function myProfile()
    {
        $jabatans = Jabatan::all();
        return view("profile", ['jabatans' => $jabatans]);
    }

    public function myProfileUdate(Request $request, User $id)
    {

        if ($request->file("profile")) {
            $request->validate([

                'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $path = "img/user_profile/";
            $file = $request->file('profile');
            $newFileName = Auth::user()->name . "." . $file->getClientOriginalExtension();
            $upload = $file->move($path, $newFileName);
            if ($upload) {
                $user = User::where('id', Auth::user()->id)->update(array('profil' => $newFileName));
                if ($user) {
                    return redirect('/admin/myprofile')->with(['success', 'Profil image Update Succesfully !']);
                }
            }
        } else if ($request->input("password")) {
            $request->validate([
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'

            ]);
            $user = User::where('id', Auth::user()->id)->update(array('password' => Hash::make($request->password)));
            if ($user) {
                return redirect('/admin/myprofile')->with(['success', 'Password Update Succesfully !']);
            }
        }
        else {
            $request->validate([
                "nama" => "required",
                "nip" => "required",
                "email" => "required|email",
                "jabatan" => "required",
                "no_hp" => "required",
            ]);
            $user = User::where('id', Auth::user()->id)->update([
                "name" => $request->input("nama"),
                "nip" => $request->input("nip"),
                "email" => $request->input('email'),
                "kode_jabatan" => $request->input("jabatan"),
                "no_hp" => $request->input("no_hp"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
            if ($user) {
                return redirect('/admin/myprofile')->with(['success', 'Profile Update Succesfully !']);
            }
        }
    }

    public function cetak()
    {
        $sumber_pelaporans = SumberPelaporan::pluck('sumber_pelaporan', 'id');
        $getTanggalPelaporan = Pelaporan::all();
        $filterTanggal = [];
        for($i=0;$i<count($getTanggalPelaporan);$i++){
            $tanggalExplode = explode(' ',$getTanggalPelaporan);
            $tanggal = $tanggalExplode[0];
            $newExplode = explode('/',$tanggal);



        }
        return view("admin.cetak_laporan.index", compact('sumber_pelaporans'));
    }
    public function cetak_laporan(Request $request)
    {
        $request->validate([
            "filter_tanggal" => 'required',
            "sumber_pelaporan" => 'required',
            "status" => 'required',
        ]);
        $tanggalFilter = explode('-', $request->filter_tanggal);
        $tanggalStart = $tanggalFilter[0];
        $tanggalEnd = $tanggalFilter[1];
        $getTanggalPelaporan = Pelaporan::all();
        $tempTanggalpelaporan = [];
        // for ($i = 0; $i < count($getTanggalPelaporan); $i++) {
        //     $tanggalExplode = explode(' ', $getTanggalPelaporan['tanggal_pelaporan']);
        //     $data = Pelaporan::where($tanggalExplode[0],)
        //     $tempTanggalpelaporan[] += $tanggalExplode[0];
        // }
        return view("admin.cetak_laporan.index");
    }
}
