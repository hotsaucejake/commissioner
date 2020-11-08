<?php

namespace App\Http\Controllers;

use App\Facades\SleeperApi;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // return dd(SleeperApi::getUserByName());
        return view('welcome');
    }
}
