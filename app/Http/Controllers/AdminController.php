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
    public function show_appoints(){
       return view('admin.show_appoints',[
           'appoints'=>Appointment::all()
       ]);
    }
    public function approveAppoint(Appointment $appoint){
      $appoint->status='Approved';
      $appoint->save();
      return back();
    }
    public function cancelAppoint(Appointment $appoint){
        $appoint->status='Canceled';
        $appoint->save();
        return back();
    }
    public function show_doctors(){
      return view('admin.show_doctors',[
          'doctors'=>Doctor::all()
      ]);
    }
    public function delete_doctor(Doctor $doctor){
      $doctor->delete();
      return back()->with('success','This doctor has been deleted');
    }
}
