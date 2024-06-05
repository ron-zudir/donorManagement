<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::orderBy('id','desc')->get();
        $total = Donor::count();
        return view('admin.donor.index',compact('donors','total'));
    }

    public function create()
    {
        return view('admin.donor.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'first_name' => 'required|string|max:25',
            'middle_name' => 'nullable|string|max:25',
            'last_name' => 'nullable|string|max:25',
            'dob' => 'required|date',
            'phone_no' => 'required|digits_between:0,12|unique:donors,phone_no',
            'photo' => 'nullable|max:5000|mimetypes:image/jpg,image/jpeg,image/png',
            'biodata' => 'nullable'
        ]);

        $data = Donor::create($validation);
        if ($data) 
        {
            session()->flash('success', 'Donor added successfully');
            return redirect(route('admin.donors'));
        }
        else
        {
            session()->flash('error','Some error occured');
            return redirect(route('admin.donors.create'));
        }
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        return view('admin.donor.edit', compact('donor'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);
        $donor->first_name = $request->first_name;
        $donor->last_name = $request->last_name;
        $donor->middle_name = $request->middle_name;
        $donor->dob = $request->dob;
        $donor->phone_no = $request->phone_no;
        $donor->biodata = $request->biodata;
        $data = $donor->save();

        if($data)
        {
            session()->flash('success', 'Donor updated successfully');
            return redirect(route('admin.donors'));
        }
        else
        {
            session()->flash('error', 'some error occured');
            return redirect(route('admin.donors.edit'));
        }
    }

    public function delete($id)
    {
        $donor = Donor::findOrFail($id)->delete();
        
        if($donor) {
            session()->flash('deleted', 'Donor deleted successfully');
            return redirect(route('admin.donors')); 
        }
        else
        {
            session()->flash('error', 'some error occured');
            return redirect(route('admin.donors'));
        }
    }
}
