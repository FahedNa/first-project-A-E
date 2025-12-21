<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //اكتبها زا كان موديل غير اسم الجدول مشان يتعرف عليه
    // protected $table = "الاسم الجديد";
    //
    // Fillable  بس يلي داخلها اقدر اخزن فيه (اعمل (insert
    protected $fillable = ['name','photo','price','details','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = false;
}
