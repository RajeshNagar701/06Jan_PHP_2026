<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {}

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

    public function api_store(Request $request)
    {
        $validate = validator::make($request->all(), [
            'name' => 'Required',
            'email' => 'Required|email',
            'password' => 'Required',
            'mobile' => 'Required',
            'image' => 'Required'
        ]);

        if ($validate->fails()) {
            return [
                'success' => 0,
                'message' => $validate->messages(),
            ];
        } else {
            $data = new user;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->mobile = $request->mobile;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_img.' . $request->file('image')->getClientOriginalExtension();
                $image->move('upload/customer/', $filename);  // use move for move image in public/images
                $data->image = $filename;
            }
            $data->save();
            return response()->json([
                'status' => 200,
                'message' => "Register Success"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $data = user::all();
        return view('welcome', ['data' => $data]);
    }

    public function api_show(user $user)
    {
        $data = user::all();
        return response()->json([
            'users' => $data,
            'status' => 200
        ]);
    }

    public function api_show_single(user $user, $id)
    {
        $data = user::find($id);
        return response()->json([
            'users' => $data,
            'status' => 200
        ]);
    }


    function search($key)
    {
        $data = user::where('name', 'LIKE', "%$key%")->orWhere('email', 'LIKE', '%' . $key . '%')->get();
        return response()->json([
            'status' => 200,
            'users' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    public function api_update(Request $request, user $user,$id)
    {
        $validate = validator::make($request->all(), [
            'name' => 'Required',
            'email' => 'Required|email',
            'password' => 'Required',
            'mobile' => 'Required',
            'image' => 'Required'
        ]);

        if ($validate->fails()) {
            return [
                'success' => 0,
                'message' => $validate->messages(),
            ];
        } else {
            $data = user::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->mobile = $request->mobile;

            if ($request->hasFile('image')) {
                unlink('upload/customer/' . $data->image);
                $file = $request->file('image');
                $filename = time() . "_img." . $request->file('image')->getClientOriginalExtension(); //"125455565656_img.jpg"
                $file->move('upload/customer/', $filename); // upload image in public
                $data->image = $filename;
            }
            $data->update();
            return response()->json([
                'status' => 200,
                'message' => "Update Success"
            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }

    public function api_destroy(user $user, $id)
    {
        user::find($id)->delete();
        return response()->json([
            'status' => 200,
            'msg' => "Delete Success"
        ]);
    }
}
