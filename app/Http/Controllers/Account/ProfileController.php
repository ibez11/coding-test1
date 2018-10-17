<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Account\UserModel;
use Session;

class ProfileController extends Controller
{

    protected $account_user_model;

    public function __construct()
    {
        $this->account_user_model = new UserModel();
    }

    public function index(Request $request) {
        if(!Session::get('islogged')) {
            return redirect()->to('/');
        }
        $data['phone'] = 'Phone';
        $data['gender'] = 'Gender';
        $data['birthdate'] = 'Birthdate';
        $data['nationality']    = 'Nationality';
        $result = $this->account_user_model->DetailUser();
        
        if ($result->phone) {
            $data['phone_value'] = $result->phone;
        } else {
            $data['phone_value'] = '';
        }

        if ($result->gender) {
            $data['gender_value_m'] = 'checked'; 
            $data['gender_value_f'] = ''; 
        } else {
            $data['gender_value_m'] = ''; 
            $data['gender_value_f'] = 'checked'; 
        }

        if ($result->birthdate) {
            $data['birthdate_value'] = $result->birthdate; 
        } else {
            $data['birthdate_value'] = ''; 
        }

        if ($result->nationality) {
            $data['nationality_value'] = $result->nationality; 
        } else {
            $data['nationality_value'] = ''; 
        }
        
        
        if(($request->server("REQUEST_METHOD") == 'POST')) {
            $this->account_user_model->ChangeUser($request->all());
           
            $success = array();
            $success['success'] = 'Anda berhasil merubah!!!';
            return redirect()->to('/profile')->with($success);
        }
        return view('account.profile',$data);
    }
}