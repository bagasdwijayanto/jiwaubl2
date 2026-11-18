<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportTransaksiController extends Controller
{
    //
    public function getIndex(Request $request) 
    {

        // $produk = DB::table('v_inovasi')->where('jenis_inovasi','produk')->get();

        $data = [
            'title' => 'Laporan Transaksi Data Inovasi (produk)',
            // 'datajasa' => $jasa,
            'breadcrumb' => [
                ['url' => 'dashboard' , 'name' => 'Dashboard'],
                ['url' => 'transaksiproduk' , 'name' => 'Laporan Transaksi Data Inovasi (produk)'],
            ],
            
            'testVariable' => 'Laporan Transaksi Data Inovasi (produk)'
        ];

         
        return view('datatransproduk.index', $data);
        // dd($mobile);
    }

    public function getIndexJasa(Request $request) 
    {

        // $jasa = DB::table('v_inovasi')->where('jenis_inovasi','jasa')->get();

        $data = [
            'title' => 'Laporan Transaksi Data Inovasi (jasa)',
            // 'datajasa' => $jasa,
            'breadcrumb' => [
                ['url' => 'dashboard' , 'name' => 'Dashboard'],
                ['url' => 'transaksijasa' , 'name' => 'Laporan Transaksi Data Inovasi (jasa)'],
            ],
            
            'testVariable' => 'Laporan Transaksi Data Inovasi (jasa)'
        ];

         
        return view('datatransjasa.index', $data);
        // dd($mobile);
    }
}
