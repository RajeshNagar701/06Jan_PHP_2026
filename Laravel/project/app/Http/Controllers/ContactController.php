<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('website.contact');
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
			'email'=> 'required|unique:contacts',
			'coment'=> 'required'
		]);
		
        $contact = new contact();
        $contact->name = $request->name; // $name=$_REQUEST['name'];
        $contact->email = $request->email;
        $contact->coment = $request->coment;

        $contact->save();
        return redirect()->back(); // usi page vapis redirect karenga
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        $contacts = contact::paginate(10);  // select * from contact & data fetch
		//getdata($contacts);
        return view('admin.manage_contacts', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact,$id)
    {
        $contact=contact::find($id);
		$contact->delete();
		return redirect()->back();
    }
}
