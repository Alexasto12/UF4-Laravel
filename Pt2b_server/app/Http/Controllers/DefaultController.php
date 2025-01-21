<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DefaultController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function home() 
    { 
      return view('default.home');
    }
    function ereaseCookie() 
    { 
      return redirect()->route('home')->with('status', 'Cookie eliminada!')->withoutCookie('autor');
    }
}