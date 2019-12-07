<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\invoice;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Получить текущего аутентифицированного пользователя...
        $user = Auth::user();

        $companyid = $user -> company_id;
        //dd($companyid);
        $invoices = invoice::where('company_id', $companyid)->get();

        return view('home',compact('user', 'invoices'));

    }

    public function admin()

    {
        return view('admin');
    }
}
