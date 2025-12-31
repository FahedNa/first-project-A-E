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


    public function create()
    {
        return view('layouts.offers.addProperty');
    }
public function store(AddRequest $request)
{
    $imageName = null;

    if ($request->hasFile('Image')) {
        $image = $request->file('Image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/properties'), $imageName);
    }

    AddProperty::create([
        'Property_Title' => $request->Property_Title,
        'Description' => $request->Description,
        'Price' => $request->Price,
        'Property_Type' => $request->Property_Type,
        'Street_Address' => $request->Street_Address,
        'phone_num' => $request->phone_num,
        'floor' => $request->floor,
        'Bedrooms' => $request->Bedrooms,
        'Bathrooms' => $request->Bathrooms,
        'Square_Feet' => $request->Square_Feet,
        'Status' => $request->Status,
        'Image' => $imageName, // اسم الصورة
    ]);

    return redirect()->back()->with('success', 'Property added successfully');
}










    // ...........................................................
    public function AdmingetAllProperty(){
                    $add=AddProperty::select('id','Property_Title','Description','Price','Property_Type','Street_Address','phone_num','floor','Bedrooms','Bathrooms','Square_Feet','Status','Image')->get();
        return view('layouts.offers.adminallProperty',compact('add'));
    }
    //with out searsh
        // //getallofeer
        // public function getAllProperty(){
        //     //get return data as collection
        //     $add=AddProperty::select('id','Property_Title','Description','Price','Property_Type','Street_Address','phone_num','floor','Bedrooms','Bathrooms','Square_Feet','Status','Image')->get();
        //     return view('layouts.offers.allProperty',compact('add'));
        // }

          public function editProperty($id){
            //validate if id exist
        AddProperty::findOrFail($id);

        $property=AddProperty::select('id','Property_Title','Description','Price','Property_Type','Street_Address','phone_num','floor','Bedrooms','Bathrooms','Square_Feet','Status','Image')->find($id);
            return view('layouts.offers.editProperty',compact('property'));

            // return $id;
        }
        // public function updateProperty(AddRequest $request , $property_id){

        //     //validate
        //     //update
        //         $add=AddProperty::find($property_id);
        //     $add ->update($request ->all());
        //     return redirect()-> back() -> with(['success' => 'update sucsess']);}
public function updateProperty(AddRequest $request, $property_id)
{
    $property = AddProperty::findOrFail($property_id);

    $imageName = $property->Image; // الصورة القديمة

    if ($request->hasFile('Image')) {

        // حذف الصورة القديمة إن وجدت
        if ($property->Image && file_exists(public_path('uploads/properties/' . $property->Image))) {
            unlink(public_path('uploads/properties/' . $property->Image));
        }

        // حفظ الصورة الجديدة
        $image = $request->file('Image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/properties'), $imageName);
    }

    $property->update([
        'Property_Title' => $request->Property_Title,
        'Description' => $request->Description,
        'Price' => $request->Price,
        'Property_Type' => $request->Property_Type,
        'Street_Address' => $request->Street_Address,
        'phone_num' => $request->phone_num,
        'floor' => $request->floor,
        'Bedrooms' => $request->Bedrooms,
        'Bathrooms' => $request->Bathrooms,
        'Square_Feet' => $request->Square_Feet,
        'Status' => $request->Status,
        'Image' => $imageName,
    ]);

    return redirect()->back()->with('success', 'Property updated successfully');
}






        // ........
        public function deleteProperty($id){

             $add=AddProperty::find($id);
               if(!$add)
        return redirect()->back()->with(['error' => 'id not exsist']);

            $add ->delete();
            return redirect()-> back() -> with(['success' => 'success deleted']);

        }
//searsh
public function getAllProperty(Request $request)
{
    $query = AddProperty::query();

    // Search keyword
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('Property_Title', 'like', "%$search%")
              ->orWhere('Street_Address', 'like', "%$search%")
              ->orWhere('Property_Type', 'like', "%$search%")
              ->orWhere('Price', 'like', "%$search%")
              ->orWhere('phone_num', 'like', "%$search%")
              ->orWhere('Status', 'like', "%$search%");

        });
    }

    $add = $query->get();

    return view('layouts.offers.allProperty', compact('add'));
}


}
