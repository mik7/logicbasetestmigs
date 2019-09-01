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
        $profiles = Profile::latest()->paginate(4);
        return view('profiles.dashboard', compact('profiles'))
            ->with('i', (request()->input('page', 1) -1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
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
        return redirect()->route('profiles.index')
                        ->with('success', 'Profile Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
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
        $Profiles = Profile::find($id);

        if($request->hasfile('Image1'))
        {   
            $file = $request->file('Image1');
            $extension = $file->getClientOriginalExtension(); // Get Image Ext.
            $filename = time() . "." . $extension;
            $file->move('uploads/employee/', $filename);
        } else 
        {
            return $request;
        }        

        $Profiles->Fname = $request->input('Fname');
        $Profiles->Lname = $request->input('Lname');
        $Profiles->Address = $request->input('Address');
        $Profiles->Pnumber = $request->input('Pnumber');
        $Profiles->Email = $request->input('Email');
        $Profiles->Image1 = $request->input('Image1');   

        $Profiles->update();

        return redirect()->route('profiles.index')
                        ->with('success', 'Profile Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profiles = Profile::find($id);
        $profiles->delete($id);

        return redirect()->route('profiles.index')->with('success', 'Profile Successfully Deleted!');
    }
}
