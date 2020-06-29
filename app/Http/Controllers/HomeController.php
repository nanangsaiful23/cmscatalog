<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getDownload()
{
    // echo  'a';die;
    //PDF file is stored under project/public/download/info.pdf
    $file= public_path(). "/download/Formulir_Pendaftaran_ntnmart.pdf";


    $headers = array(
        'Content-Type : application/pdf',
);
// dd ($headers);die;
return response()->download($file, 'Formulir_Pendaftaran_ntnmart.pdf', $headers);
    }
}
