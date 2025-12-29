<?php

namespace App\Http\Controllers;

use App\Models\SpecialProperty;
use Illuminate\Http\Request;

class SpecialPropertyController extends Controller
{
    // صفحة واحدة تجمع الإضافة والعرض
    public function index()
    {
        $properties = SpecialProperty::orderBy('created_at', 'desc')->get();
        return view('special_properties.index', compact('properties'));
    }

    // حفظ البيانات
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:special_properties|max:255',
            'description' => 'required',
        ]);

        SpecialProperty::create($request->all());

        return redirect()->route('special-properties.index')
            ->with('success', 'Property added successfully.');
    }
}
