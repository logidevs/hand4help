<?php

namespace App\Http\Controllers;

use App\Volunteer;
use App\Requester;
use App\TypeOfSupport;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers=Volunteer::with('user')->latest()->paginate(5);

        return view('volunteer.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeOfSupports=TypeOfSupport::get();
        return view('volunteer.create', compact('typeOfSupports'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone'=>'required|string|min:8',
            'support'=>'required'
        ]);

        

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role='volunteer';
        $user->save();

        $volunteer=new Volunteer;
        $volunteer->name=$request->name;
        $volunteer->user_id=$user->id;
        $volunteer->phone=$request->phone;
        $volunteer->latitude=$request->latitude;
        $volunteer->longitude=$request->longitude;
        $volunteer->save();

        $volunteer->typeOfSupports()->sync($request->support);

        \Auth::loginUsingId($user->id);

        return redirect()->route('volunteer.profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    public function profile()
    {
        $requests_in_progress=Requester::where('volunteer_id', auth()->user()->id)->where('is_finished', false)->get();
        $requests_finished=Requester::where('volunteer_id', auth()->user()->id)->where('is_finished', true)->get();
        return view('volunteer.profile', compact('requests_in_progress', 'requests_finished'));
    }

    public function takeRequest(Requester $requester)
    {
        $requester->volunteer_id=auth()->user()->id;
        $requester->save();
        return redirect()->route('map');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteer.index');
    }
}
