<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function checking(){
        return view('storage.checking');
    }
}
