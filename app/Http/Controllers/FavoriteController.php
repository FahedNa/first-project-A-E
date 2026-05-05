<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\AddProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function add($id)
    {
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'add_property_id' => $id
        ]);

        return back()->with('success', 'Added to favorites');
    }


    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())
            ->with('property')
            ->get();

        return view('layouts.offers.favorites', compact('favorites'));
    }


    public function remove($id)
    {
        Favorite::where('user_id', Auth::id())
            ->where('add_property_id', $id)
            ->delete();

        return back()->with('success', 'Removed from favorites');
    }
    

}
