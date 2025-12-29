<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function hasOneRelation(){
          $user=User::find(24);
    // or
//   $user=  User::where('id',24)->first();
//يجبي ال من جدول الفون فقط
    // return $user -> phone;
    // يجيب من جدول اليوزر فقط
    //  return response()->json($user);
    //مشان جيب البيانات من الجدول المربوط يجيب من الجدوليم
    // with  اسم العلاقة
 $user =User::with(['phone' => function($q){
    // اوعا تنسا forgn key
    $q ->select('code','phone','user_id');
 }])->find(24);


//  $phone = $user ->phone;
return response()-> json($user);
// only return code
// nameRelation -> Key;
// return $user ->phone->code;

    }
    public function hasOneRelationReverse(){
        $phone= Phone::find(1);
        // make some attribute visible
        $phone ->makeVisible(['user_id']);
         //عكسها //$phone->makeHidden([])
        // return $phone;
        // return $phone->user;//return user of this phone number
        // get all dats phone + user
        $phone = Phone::with('user')->find(1);
        return $phone;
        // بدي جيب يوزر يلي بدون تلفونات

    }

    public function getUserHasPhone(){
          return  User::whereHas('phone')->get();
    }

    public function getUserNotHasPhone(){
          return  User::whereDoesntHave('phone')->get();

    }
    public function getUserWhereHasPhoneWithCondetion()
    {
        return User::whereHas('phone',function($q){
            $q ->where('code','+963');
        })->get();
    }
    public function getUserWhereHasNotPhoneWithCondetion()
    {
        return User::whereHas('phone',function($q){
            $q ->where('code','5');
        })->get();
    }
}
