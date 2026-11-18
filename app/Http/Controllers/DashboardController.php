<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    public function getIndex(Request $request) {
        
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Dashboard'],
                ['url' => '/interface' , 'name' => 'Interface'],
            ],
            
            'testVariable' => 'Dashboard'
        ];

         
        return view('datadashboard.index', $data);
        // dd($grafikTransaksi);
    }
}
