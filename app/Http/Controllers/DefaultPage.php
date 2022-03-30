<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultPage extends Controller
{
    public function __construct(){
        $this->middleware('adminAuth');
    }
}
