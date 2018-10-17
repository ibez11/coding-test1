<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Model\Account\UserModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $account_user_model;

    public function __construct()
    {
        $this->account_user_model = new UserModel();
    }

    public function index(Request $request) {
        $data['test'] = 'test';

        $data['phone'] = 'Phone';
        $data['gender'] = 'Gender';
        $data['birthdate'] = 'Birthdate';
        $data['nationality']    = 'Nationality';

        if(($request->server("REQUEST_METHOD") == 'POST')) {
            $result = $this->account_user_model->addUser($request->all());
            if($result['http_header'] == 200) {
                $success = array();
                $success['success'] = 'Anda berhasil mendaftar silahkan login!!!';
                return redirect()->to('/')->with($success);
            } else {
                return response($result['message'], $result['http_header']);
            }
        } 
        return view('auth.register',$data);

    }
}
