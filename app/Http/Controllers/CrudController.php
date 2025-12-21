<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Validator;

class CrudController extends Controller
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
    public function getOffers()
    {
      return  Offer::get();
    }

    // هذه تريد اشياء خاصة بها

    public function getOffers_to_this_method_only()
    {
      return  Offer::select('id','name')->get();
    }
        //store static in DB
    // public function store(){
    //     //kay = column
    //     Offer::create([
    //         'name'=>'offer3',
    //         'price'=>'5000',
    //         'details'=>'offer2_details',
    //     ]);
    // }

    public function create()
    {
        return view('layouts.offers.create');
    }
    //offer request نبعت
    public function store(OfferRequest $request)
    {
        //save php=oto in folder
        $file_extension = $request -> photo ;
        $file_name = time().'.'.$file_extension;
        $path='images/offers';
        $request -> photo -> move($path,$file_name);
        return 'ok';

        //valedate data befor insert to DB
        //inset to DB
        Offer::create([
            'photo'=> $file_name,
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);
        return redirect()->back()->with(['success'=>'Information has been added successfully']);

    }


        //getallofeer
        public function getAllOffers(){
            //get return data as collection
            $offers=Offer::select('id','name','price','details')->get();
            return view('layouts.offers.all',compact('offers'));
        }

        public function editOffer($offer_id){
            //validate if id exist
            Offer::findOrFail($offer_id);
            //validate manual
            $offer =Offer::find($offer_id);//search in given table id only
            // return redirect()->back();
            $offer = Offer::select('id','name','details','price')->find($offer_id);
            return view('layouts.offers.edit',compact('offer'));
            // return $offer_id;
        }

        public function updateOffer(OfferRequest $request, $offer_id){
                //validate
                //check if offer exist
                // $offer_id=$request->id;
                // $offer_id=$request->route('id');
        //    $offer=Offer::find($offer_id);
                // if(!$offer)
                    // return redirect()->back();
                // بدي ارجع للفورم
                // input == request
            $offer=Offer::find($offer_id);
             $offer ->update($request ->all());
            return redirect()-> back() -> with(['success' => 'update sucsess']);
                 //update
                //  $offer-> update($request -> all());
                 //شيئ معين
                //  $offer->update([
                //     'price' => $request -> price
                //  ]);
                // return redirect()->back()->with(['success'=>'success update']);
}

public function deleteOffer($offer_id){
    //check if exist id

    $offer=Offer::find($offer_id);  // Offer::where('id',' deleteOffer')
       if(!$offer)
        return redirect()->back()->with(['error' => 'id not exsist']);
        // return redirect()->back()->with(['error' => 'deleted']);

       $offer->delete();
                return redirect()->back()->with(['success'=>'success deleted']);


                // return redirect()->route('offers.delete', $offer_id)->with(['success'=>'success deleted']);






}














    //valedate data befor insert to DB
    //طريقة  غير محبذة يوجد اسهل
        //$rules=[
            //'name'=>'required|max:100|unique:offers,name',
            //'price'=>'required|numeric',
            //'details'=>'required'];
            // validate data befor insert to DB
            //$messages=[
            //'name.required'=>'you must name required',
           // 'name.unique'=>'you must name Unique',
           // 'price.numeric'=>'you must price is numeric ',
           // 'price.required'=>'you must price is required ',
         //   'details.required'=>'you must details is required ',
       // ];

        //$validator=validator($request->all(),$rules,$messages);

           // if($validator ->fails()){
                // بدي ارجع للفورم
                // input == request
             //    return redirect()->back()->withErrors($validator)->withInput($request->all());
                //يعرض كل الاخطاء
                // return $validator->errors();
                // يعرض اول خطأ فقط
                // return $validator->errors()->first();
           // }
            // التحكم بلرسائل عند الخطأ
}
