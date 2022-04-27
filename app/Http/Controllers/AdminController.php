<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_doctor(){
    return view('admin.add_doctor_view');
    }
    public function upload_doctor(){
      $formData=request()->validate([
          'name'=>['required','min:3'],
          'room'=>['required'],
          'speciality'=>['required'],
          'phone'=>['required']
      ]);
      $formData['image']=request()->file('image')->store('uploadDoctorImage');
      Doctor::create($formData);
      return redirect()->back()->with('success','New Doctor is added');
    }
}
