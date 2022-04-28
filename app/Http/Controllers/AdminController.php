<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function add_appointment(){
      $formData=request()->validate([
          'name'=>['required','min:3'],
          'email'=>['required'],
          'phone'=>['required'],
          'doctor'=>['required'],
          'message'=>['required','min:5'],
          'date'=>['required']
      ]);
      $formData['status']='In progress';
      if(Auth::user()){
        $formData['user_id']=Auth::user()->id;
      }
      Appointment::create($formData);
      return redirect()->back()->with('success','Appointment is completely requested.We will contact you soon');
    }
}
