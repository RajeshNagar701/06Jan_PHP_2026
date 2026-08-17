<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Hash;  // for enc password
//use Alert;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
         return view('website.login');
    }
	
	public function auth(Request $request)
    {
		$validated = $request->validate([
			'email'=> 'required|email',
			'password'=> 'required'
		]);
		
        $customer=customer::where('email',$request->email)->first();  // ->get() arr data ->first() single data
		if(!empty($customer))
		{
			if(Hash::check($request->password, $customer->password))
			{
				session()->put('id',$customer->id); 
				session()->put('name',$customer->name);
				Alert::success('Congrats', 'You\'ve Successfully Registered');
				return redirect('/');		
			}
			else
			{
				Alert::error('Failed', 'Login failed due to Wrong Creadenncial');
				return redirect()->back();
			}
		}
		else
		{
			Alert::error('Failed', 'Login failed due to Customer does not exist');
			return redirect()->back();
		}	
	}
	
	public function user_logout()
    {
		session()->pull('id');  // session delete
		session()->pull('name');
		Alert::success('Congrats', 'You\'ve Successfully Logout');	
        return redirect('/');		
    }

	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validated = $request->validate([
			'name'=> 'required|alpha:ascii|max:255',
			'email'=> 'required|unique:customers',
		]);
		
		
        $customer=new customer();
		$customer->name=$request->name;
		$customer->email=$request->email;
		$customer->password=Hash::make($request->password);
		$customer->gender=$request->gender;
		$customer->hobby=implode(",",$request->hobby);
		$customer->mobile=$request->mobile;
		
		// img upload
		$image=$request->file('image');
		$filename=time().'_img.'.$request->file('image')->getClientOriginalExtension(); // 121545454_img.jpg
		$image->move('admin/upload/customer',$filename); // upload file in public 
		
		$customer->image=$filename;
		$customer->save(); // insert function
		Alert::success('Congrats', 'You\'ve Successfully Signup');	
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        $customers=customer::all();
        return view('admin.manage_customer',compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
	 
	 
	public function user_profile(customer $customer)
    {
        $customer=customer::where('id',session('id'))->first(); // first get only 1 data in string
        return view('website.user_profile',compact('customer'));
    } 
	 
    public function edit(customer $customer,$id)
    {
        $edit_user=customer::find($id);  // find bu url id
		return view('website.edit_profile',compact('edit_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer,$id)
    {
        $customer=customer::find($id);
		$customer->name=$request->name;
		$customer->email=$request->email;
		$customer->gender=$request->gender;
		$customer->hobby=implode(",",$request->hobby);
		$customer->mobile=$request->mobile;
		
		// img upload
		if($request->hasFile('image')) 
		{
			$old_image=$customer->image;
			unlink('admin/upload/customer/'.$old_image);
			
			$image=$request->file('image');
			$filename=time().'_img.'.$request->file('image')->getClientOriginalExtension(); // 121545454_img.jpg
			$image->move('admin/upload/customer',$filename); // upload file in public 
			$customer->image=$filename;
		}
		
		$customer->update(); // update function
		Alert::success('Congrats', 'You\'ve Successfully Updated');	
		return redirect('/user_profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer,$id)
    {
        $customer=customer::find($id);
		$image=$customer->image;
		unlink('admin/upload/customer/'.$image);
		
		$customer->delete();
		return redirect()->back()->with('message', 'Deleted Success');;
    }
	
	public function status_customer(customer $customer,$id)
    {
        $customer=customer::find($id);
		$status=$customer->status;
		if($status=="Block")
		{
			$customer->status="Unblock";
		}
		else
		{
			$customer->status="Block";
		}	
		
		$customer->update();
		return redirect()->back()->with('message', 'Updated Success');
    }
	
}
