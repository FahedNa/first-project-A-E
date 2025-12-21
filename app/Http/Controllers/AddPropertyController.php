<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Models\AddProperty;
use App\Models\Offer;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AddPropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //all method
    public function getProperty()
    {
      return  AddProperty::get();
    }

    // هذه تريد اشياء خاصة بها


        // store static in DB
    // public function store(){
    //     //kay = column

    //   AddProperty::create([
    //         'Property_Title'=>'beautiful',
    //         'Description'=>'my ant house',
    //         'Price'=>'7500',
    //         'Property_Type'=>'Villa',
    //         'Street_Address'=>'12 bash St',
    //         'City'=>'syria',
    //         'State'=>'Damas',
    //         'floor'=>'4',
    //         'Bedrooms'=>'3',
    //         'Bathrooms'=>'1',
    //         'Square_Feet'=>'1750',
    //         'Status'=>'sold',
    //         'Image'=>'https://example.com',
    //     ]);
    // }


    public function create()
    {
        return view('layouts.offers.addProperty');
    }
    public function store(AddRequest $request)
    {
        // validate data befor insert to DB
        // inset to DB

         AddProperty::create([
            'Property_Title'=>$request->Property_Title,
            'Description'=>$request->Description,
            'Price'=>$request->Price,
            'Property_Type'=>$request->Property_Type,
            'Street_Address'=>$request->Street_Address,
            'City'=>$request->City,
            'floor'=>$request->floor,
            'Bedrooms'=>$request->Bedrooms,
            'Bathrooms'=>$request->Bathrooms,
            'Square_Feet'=>$request->Square_Feet,
            'Status'=>$request->Status,
            'Image'=>$request->Image,
        ]);
               return redirect()->back()->with(['success'=>'Information has been added successfully']);


    }

        //getallofeer
        public function getAllProperty(){
            //get return data as collection
            $add=AddProperty::select('id','Property_Title','Description','Price','Property_Type','Street_Address','phone_num','floor','Bedrooms','Bathrooms','Square_Feet','Status','Image')->get();
            return view('layouts.offers.allProperty',compact('add'));
        }

          public function editProperty($id){
            //validate if id exist
        AddProperty::findOrFail($id);

        $property=AddProperty::select('id','Property_Title','Description','Price','Property_Type','Street_Address','phone_num','floor','Bedrooms','Bathrooms','Square_Feet','Status','Image')->find($id);
            return view('layouts.offers.editProperty',compact('property'));

            // return $id;
        }
        public function updateProperty(AddRequest $request , $property_id){

            //validate
            //update
                $add=AddProperty::find($property_id);
            $add ->update($request ->all());
            return redirect()-> back() -> with(['success' => 'update sucsess']);
}
        public function deleteProperty($id){

             $add=AddProperty::find($id);
               if(!$add)
        return redirect()->back()->with(['error' => 'id not exsist']);

            $add ->delete();
            return redirect()-> back() -> with(['success' => 'success deleted']);

        }





}
