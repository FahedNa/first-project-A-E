<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'add_property_id'
    ];

//  المفضلة  مرتبطة بعقار واحد
    public function property()
    {
        return $this->belongsTo(AddProperty::class, 'add_property_id');
    }
//  المفضلة مرتبطة بمستخدم واحد
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
