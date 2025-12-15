<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "in index method";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obj = new \stdClass();
        $obj -> name="fhd";
        $obj -> age="22";
         return view("fhd",compact('obj'));

        // $data=[];
        // $data["data"]="with ahmad data";
        // $data["age"]="22";
        // return view("fhd",$data);
        // //اعطاء القيمة 2 ل data
//  return view("fhd")->with('data','with Ahmad');

 //with more data
//  return view("fhd")->with(['data'=>'with Ahmad','age'=>22]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //post
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "in show method";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
