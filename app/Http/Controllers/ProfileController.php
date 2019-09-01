<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('dashboard')->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profiles = new Profile();

        $profiles->Fname = $request->input('Fname');
        $profiles->Lname = $request->input('Lname');
        $profiles->Address = $request->input('Address');
        $profiles->Pnumber = $request->input('Pnumber');
        $profiles->Email = $request->input('Email');
        $profiles->Image1 = $request->input('Image1');

        if($request->hasfile('Image1'))
        {
            $file = $request->file('Image1');
            $extension = $file->getClientOriginalExtension(); // Get Image Ext.
            $filename = time() . "." . $extension;
            $file->move('uploads/employee/', $filename);
            $profiles->Image1 = $filename;
        } else 
        {
            return $request;
            $profiles->Image1 = '';
        }

        $profiles->save();

        return redirect()->route('display');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $profiles = Profile::all();
        return view('dashboard')->with('profiles', $profiles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = Profile::find($id);
        return view('edit')->with('profiles', $profiles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profiles = Profile::find($id);

        $profiles->Fname = $request->input('Fname');
        $profiles->Lname = $request->input('Lname');
        $profiles->Address = $request->input('Address');
        $profiles->Pnumber = $request->input('Pnumber');
        $profiles->Email = $request->input('Email');    
        $oldprofilepic = $profiles->Image1;    
        $profiles->Image1 = $request->input('Image1');

        if($request->hasfile('Image1'))
        {
            $file = $oldprofilepic;
            $extension = $file->getClientOriginalExtension(); // Get Image Ext.
            $filename = time() . "." . $extension;
            $file->delete('uploads/employee/', $filename);
            
            $file = $request->file('Image1');
            $extension = $file->getClientOriginalExtension(); // Get Image Ext.
            $filename = time() . "." . $extension;
            $file->move('uploads/employee/', $filename);
            $profiles->Image1 = $filename;
        } else 
        {
            return $request;
        }

        $profiles->save();

        return redirect()->route('display');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
