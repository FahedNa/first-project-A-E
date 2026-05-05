<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RealEstateOffice;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    // show in  admin
    public function index()
    {
        $offices = RealEstateOffice::latest()->get();
        return view('offices.admin.index', compact('offices'));
    }

      public function frontIndex()
    {
        $offices = RealEstateOffice::latest()->get();
        return view('offices.front.index', compact('offices'));
    }


    public function create()
    {
        return view('offices.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:real_estate_offices,email',
        ]);

        RealEstateOffice::create($request->all());

        return redirect()->route('admin.offices.index')
            ->with('success', 'تم إضافة المكتب العقاري بنجاح');
    }

    public function destroy(RealEstateOffice $office)
    {
        $office->delete();

        return redirect()->route('admin.offices.index')
            ->with('success', 'تم حذف المكتب العقاري بنجاح');
    }
}
