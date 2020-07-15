<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("admin.user_management.index", ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view("admin.user_management.create_user", ["jabatans" => $jabatans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "nama" => "required",
            "nip" => "required",
            "email" => "required|email",
            "password" => "required",
            "jabatan" => "required",
            "no_hp" => "required",
            "role" => "required",
        ]);

        $users = User::create([
            "name" => $request->input("nama"),
            "nip" => $request->input("nip"),
            "email" => $request->input("email"),
            "no_hp" => $request->input("no_hp"),
            "password" => Hash::make($request->input("password")),
            "kode_jabatan" => $request->input("jabatan"),
            "profil" => "default_profile.png",
            "is_admin" => $request->input("role"),
            "created_at" =>  date("Y-m-d H:i:s"),
            "updated_at" =>  date("Y-m-d H:i:s"),

        ]);
        $users->save();
        if ($users) {
            return redirect('admin/users')->with([
                'message' => "User created Successfully",
                'alert' => "alert-success",
            ]);
        } else {
            return redirect('admin/users')->with([
                'message' => "User created Filed",
                'alert' => "alert-danger",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        $jabatans = Jabatan::all();
        return view("admin.user_management.detail_user", [
            "users" => $users,
            "jabatans" => $jabatans,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $jabatans = Jabatan::all();
        return view("admin.user_management.update_user", [
            "users" => $users,
            "jabatans" => $jabatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $checkUser = User::find($id);
        if ($request->file("profile")) {
            $request->validate([

                'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $path = "img/user_profile/";
            $file = $request->file('profile');
            $newFileName = $checkUser['name'] . "." . $file->getClientOriginalExtension();
            $upload = $file->move($path, $newFileName);
            if ($upload) {
                $user = User::where('id', $checkUser['id'])->update(array('profil' => $newFileName));
                if ($user) {
                    return redirect('/admin/users')->with([
                        'message' => "Profile Image Updated Successfully",
                        'alert' => "alert-success",
                    ]);
                }
            }
        } else if ($request->input("password")) {
            $request->validate([
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'

            ]);
            $user = User::where('id', $checkUser['id'])->update(array('password' => Hash::make($request->password)));
            if ($user) {
                return redirect('/admin/users')->with([
                    'message' => "Password Updated Successfully",
                    'alert' => "alert-success",
                ]);
            }
        } else {
            $request->validate([
                "nama" => "required",
                "nip" => "required",
                "email" => "required|email",
                "jabatan" => "required",
                "no_hp" => "required",
                "role" => "required",
            ]);
            $user = User::where('id', $checkUser['id'])->update([
                "name" => $request->input("nama"),
                "nip" => $request->input("nip"),
                "email" => $request->input('email'),
                "kode_jabatan" => $request->input("jabatan"),
                "no_hp" => $request->input("no_hp"),
                "is_admin" => $request->input("role"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
            if ($user) {
                return redirect('/admin/users')->with([
                    'message' => "Profile Updated Successfully",
                    'alert' => "alert-success",
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::destroy($id);
        if ($user) {
            return redirect('admin/users')->with([
                'message' => "Data deleted successfully",
                'alert' => "alert-success",
            ]);
        } else {
            return redirect('admin/users')->with([
                'message' => "Data deleted failed",
                'alert' => "alert-danger",
            ]);
        }
    }
}
