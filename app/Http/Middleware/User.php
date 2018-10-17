<?php
namespace App\Http\Middleware;

use Session;
use Closure;

class User {
     /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */

    protected $user_id;

    public function __construct() {
        if (Session::get('user_id')) {
            $this->user_id = Session::get('user_id');
        } else {
            $this->logout();
        }
    }

    public function login($email, $password, $override = false) {
    }

    public function isLogged() {
		return $this->user_id;
    }
    
    public function logout() {
		Session::forget('customer_id');

		$this->user_id = ''; 
	}
}