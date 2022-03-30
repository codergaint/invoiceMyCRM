<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class CrmAdminController extends Controller
{
    public function __construct(){
        //$this->middleware('SuperAdmin');
        $this->middleware('crmAuth');
    }
    
    public function home(){
        $user = User::find(Session::get('crmAuth'));
        return view('crm.dashboard.home',['user'=>$user]);
    }
}
