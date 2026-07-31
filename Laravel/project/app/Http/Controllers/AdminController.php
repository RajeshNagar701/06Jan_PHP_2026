<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Hash;  // for enc password

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function login()
    {
         return view('admin.admin_login');
    }
	
	public function auth(Request $request)
    {
        $admin=admin::where('email',$request->email)->first();  // ->get() arr data ->first() single data
		if(!empty($admin))
		{
			if(Hash::check($request->password, $admin->password))
			{
				session()->put('aid',$admin->id); 
				session()->put('aname',$admin->name);
				return redirect('/dashboard');		
			}
			else
			{
				return redirect()->back()->with('message', 'Login failed due to Wrong Creadenncial');
			}
		}
		else
		{
			return redirect()->back()->with('message', 'Login failed due to admin does not exist');
		}	
	}
	
	public function admin_logout()
    {
		session()->pull('aid');  // session delete
		session()->pull('aname');
        return redirect('/admin-login');		
    }
 
	 
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
