<?php

namespace App\Http\Controllers;

use App\TypeOfSupport;

use Illuminate\Http\Request;

class TypeOfSupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeOfSupports=TypeOfSupport::get();
        return view('typeOfSupport.index', compact('typeOfSupports'));
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
        $request->validate([
            'name_sr' => 'required|string|max:255',
            'name_en' => 'string|max:255',
            'name_al' => 'string|max:255'

        ]);


        $typeOfSupport=new TypeOfSupport;
        $typeOfSupport->name_sr=$request->name_sr;
        $typeOfSupport->name_en=$request->name_en;
        $typeOfSupport->name_al=$request->name_al;
        $typeOfSupport->save();

        return redirect()->route('typeOfSupport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeOfSupport  $typeOfSupport
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfSupport $typeOfSupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeOfSupport  $typeOfSupport
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfSupport $typeOfSupport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeOfSupport  $typeOfSupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeOfSupport $typeOfSupport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeOfSupport  $typeOfSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfSupport $typeOfSupport)
    {
        if($typeOfSupport->volunteers->count()>0||$typeOfSupport->requesters->count()>0)
        {
            return redirect()->route('typeOfSupport.index');
        }
        $typeOfSupport->delete();
        return redirect()->route('typeOfSupport.index');
    }
}
