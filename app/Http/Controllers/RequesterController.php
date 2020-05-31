<?php

namespace App\Http\Controllers;

use App\Requester;
use App\TypeOfSupport;
use App\User;
use Illuminate\Http\Request;

class RequesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requesters=Requester::paginate(10);

        return view('requester.index', compact('requesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeOfSupports=TypeOfSupport::get();
        return view('requester.create', compact('typeOfSupports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'asker_name' => 'nullable|string|max:255',
            'asker_email' => 'required_with:asker_name|nullable|string|email|max:255',
            'asker_phone'=>'required_with:asker_name|nullable|string|min:8',
            'asker_relationship' => 'required_with:asker_name|nullable|string|max:255',
            'asker_address' => 'required_with:asker_name|nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone'=>'required|string|min:8',
            'support'=>'required'
        ]);


        $requester=new Requester;
        $requester->asker_name=$request->asker_name;
        $requester->asker_email=$request->asker_email;
        $requester->asker_phone=$request->asker_phone;
        $requester->asker_relationship=$request->asker_relationship;
        $requester->asker_address=$request->asker_address;
        $requester->name=$request->name;
        $requester->email=$request->email;
        $requester->phone=$request->phone;
        $requester->latitude=$request->latitude;
        $requester->longitude=$request->longitude;
        $requester->save();

        $requester->typeOfSupports()->sync($request->support);

        return redirect()->route('map');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function show(Requester $requester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function edit(Requester $requester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requester $requester)
    {
        //
    }

    public function profile(Requester $requester)
    {
        return view('requester.profile', compact('requester'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requester $requester)
    {
        $requester->delete();
        return redirect()->route('requester.index');
    }
}
