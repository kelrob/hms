<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    function index() {
        return view('Public.index');
    }

    function doctors() {
        return view('Public.doctors');
    }

    function departments() {
        return view('Public.departments');
    }
}
