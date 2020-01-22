<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
class CreatesController extends Controller
{
	// getting list doctor's list
    public function home()
    {
    	$doctors = Doctor::all();
    	return view('home', ['doctors' => $doctors]);
    }

    // insert doctor's details
    public function insert(Request $request)
    {
		$this->validate($request, [
    		"title" => 'required',
    		"description" => 'required'
    	]);

		$doctors = new Doctor;
        $doctors->title = $request->title;
    	$doctors->description = $request->description;

    	$doctors->save();
    	return redirect('/')->with('info', "Record $doctors->title created successfully");
    }

    public function update($id){
    	$doctor = Doctor::find($id);
    	return view('update', ['doctor' => $doctor]);
    }

    public function edit(Request $request, $id){
    	$this->validate($request, [
    		"title" => 'required',
    		"description" => 'required'
    	]);

    	$date = Doctor::where('id', $id)->update([
    		"title" => $request->title,
    		"description" => $request->description
    	]);

    	return redirect('/')->with('info', "Record $request->title updated successfully");
    }

	public function read($id){

    	$doctor = Doctor::find($id);

    	return view('read', ['doctor' => $doctor]);
    }
    public function delete($id){
        Doctor::where('id', $id)->delete();
        return redirect('/')->with('info', "Record Deleted successfully");
    }

}









