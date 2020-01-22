<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function pintuMasuk(Request $request){
        return "Selamat datang di pintu masuk (dari controller)";
        }
}
