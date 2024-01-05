<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Amenity;

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

    } // End method

    public function deleteType($id){

        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Type deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method

    public function allAmenities(){
        $amenities = Amenity::latest()->get();
        return view('amenities.all', compact('amenities'));
    } // End method

    public function addAmenity(){
        return view('amenities.add_amenity');
    }// End method

    public function storeAmenity(Request $request){

        $request->validate([
            'amenity_name' => 'required|unique:amenities'
        ]);

        Amenity::insert([
            'amenity_name' => $request->amenity_name
        ]);

        $notification = array(
            'message' => 'Amenity added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }

    public function editAmenity($id){
        $amenity = Amenity::findOrFail($id);
        return view('amenities.edit_amenity', compact('amenity'));
    }

    public function updateAmenity(Request $request){

        Amenity::findOrFail($request->id)->update([
            'amenity_name' => $request->amenity_name
        ]);

        $notification = array(
            'message' => 'Amenity update successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }
}
