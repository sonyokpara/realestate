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
    }// End method

    public function storeType(Request $request){

        $request->validate([
            'prop_name' => 'required|unique:property_types|max:200',
            'prop_image' => 'required'
        ]);

        PropertyType::insert([
            'prop_name' => $request->prop_name,
            'prop_image' => $request->prop_image
        ]);

        $notification = array(
            'message' => 'Property Type Added!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    } // End method

    public function editType($id){

        $type = PropertyType::findOrFail($id);
        return view('propertyType.edit', compact('type'));

    }// End method

    public function updateType(Request $request){

        PropertyType::findOrFail($request->id)->update([
            'prop_name' => $request->prop_name,
            'prop_image' => $request->prop_image
        ]);

        $notification = array(
            'message' => 'Property Type Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);

    }// End method

    public function deleteType($id){

    }// End method
}
