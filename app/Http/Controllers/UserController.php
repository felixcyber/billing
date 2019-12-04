<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->pluck('title', 'id');
        return view('users/create', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'company_id' => 'required|max:50',
            'is_admin' => 'nullable',

        ]);
        $user = User::create($validatedData);

        return redirect('admin/users')->with('success', 'Юзер збережений');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $companies = Company::all()->pluck('title', 'id');

        return view('users/edit', compact('user', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hpassword = Hash::make($request -> password);
        $request -> password = $hpassword;

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'company_id' => 'required|max:50',
            'is_admin' => 'nullable',
        ]);

        $validatedData['password'] = $hpassword;
        //dd($request -> password);
        //dd($validatedData);
        //dd($request);
        User::whereId($id)->update($validatedData);

        return redirect('admin/users')->with('success', 'Користувач '. $request -> name. ' відновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/users')->with('success', 'Користувач '. $user -> name. ' видалений');
    }
}
