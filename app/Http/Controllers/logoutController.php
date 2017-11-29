<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class logoutController extends Controller
{
    public function logout(){
    	Session::flush();
    	return redirect('login');
    }
}
