<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function allType(){
        $types = PropertyType::latest()->get();
        return view('propertyType.all', compact('types'));
    }// End method

    public function addTypeForm(){
        return view('propertyType.add_type');
    }

    public function addType(Request $request){

        $request->validate([
            
        ]);
    }
}
