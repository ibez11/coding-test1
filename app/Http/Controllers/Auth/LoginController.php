<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Model\Account\UserModel;

class LoginController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {
        if(Session::get('islogged')) {
            return redirect()->to('/');
        }
        if(($request->server("REQUEST_METHOD") == 'POST')) {
            $email = $request->email;
            $password = $request->password;
            $result = UserModel::where('email',$email)->first();
            // print_r($result);
            if($result){
                $hash1 = Hash::make('qwerty');
                if(Hash::check($password,$result->pw)){
                    Session::put('fullname',$result->fullname);
                    Session::put('email',$result->email);
                    Session::put('id',$result->id);
                    Session::put('islogged',TRUE);
                    $success = array();
                    $success['success'] = 'Anda berhasil mendaftar silahkan login!!!';
                    return redirect()->to('/')->with($success);
                } else{
                    return redirect('login')->with('status','Password atau Email, Salah !');
                }
            }  else{
                return redirect('login')->with('status','Password atau Email, Salah!');
            }
        } 

        return view('auth.login');
    }

    public function logout() {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
