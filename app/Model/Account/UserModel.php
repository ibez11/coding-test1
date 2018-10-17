<?php

namespace App\Model\Account;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use Hash;
use Exception;

/**
 * @property int $id
 * @property string $fullname
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property int $gender
 * @property string $birthdate
 * @property string $nationality
  */
class UserModel extends Model
{
    protected $table = 'users';
    /**
     * @var array
     */
    protected $fillable = ['id', 'fullname','address','email','phone', 'gender', 'birthdate', 'nationality'];

    public function addUser(array $data) {
        try {
            $query = DB::table('users')->insert(
                ['fullname'         => $data['fullname'],
                'email'             => $data['email'],
                'address'           => $data['address'],
                'pw'                => Hash::make($data['password']),
                'phone'             => $data['phone'],
                'gender'            => (int)$data['gender'],
                'birthdate'         => $data['birthdate'],
                'nationality'       => $data['nationality'],
                'created_at'        => DB::raw('NOW()')]
            );
        } catch(\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return array('message'=>'Duplicate entry exception','http_header'=> 403);
            }
            if($errorCode == 1064) {
                return array('message'=>'Not null exception','http_header'=> 422);
            }
            if($errorCode == 1048) {
                return array('message'=>'Data tidak boleh kosong','http_header'=> 403);
            }
        }
        
        return array('message'=>'success','http_header'=> 200);
    }

    public function LoginUser(array $data) {
        
        
    }

    public function ChangeUser(array $data) {
        try {
            DB::table('users')->where('id','=',(int)Session::get('id'))
                ->update(
                    ['phone'    => $data['phone'],
                    'gender'    => (int)$data['gender'],
                    'birthdate'  => $data['birthdate'],
                    'nationality'=> $data['nationality']]
                );
        } catch(\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return array('message'=>'Duplicate entry exception','http_header'=> 403);
            }
            if($errorCode == 1064) {
                return array('message'=>'Not null exception','http_header'=> 422);
            }
            if($errorCode == 1048) {
                return array('message'=>'Data tidak boleh kosong','http_header'=> 403);
            }
        }
        
        return array('message'=>'success','http_header'=> 200);
    }

    public function DetailUser() {
        try {
            $query = DB::table('users')->where('id','=',(int)Session::get('id'))->first();
        } catch(\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return array('message'=>'Duplicate entry exception','http_header'=> 403);
            }
            if($errorCode == 1064) {
                return array('message'=>'Not null exception','http_header'=> 422);
            }
            if($errorCode == 1048) {
                return array('message'=>'Data tidak boleh kosong','http_header'=> 403);
            }
        }
        
        return $query;

    }

}
