<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class VendedorController extends Controller
{

    public function index(){
        return view('index_vendedor');
    }
}
