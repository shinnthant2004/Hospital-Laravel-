<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendMailNotication;
use Illuminate\Support\Facades\Notification;

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
    public function update_doctor(Doctor $doctor){
      return view('admin.update_doctor_view',[
          'doctor'=>$doctor
      ]);
    }
    public function updating_doctor(Request $request,Doctor $doctor){
       $doctor->name=$request->name;
       $doctor->phone=$request->phone;
       $doctor->speciality=$request->speciality;
       $doctor->room=$request->room;
       if($request->image){
           $imageName=request()->file('image')->store('uploadDoctorImage');
           $doctor->image=$imageName;
       }
       $doctor->save();
       return redirect()->back()->with('success','Successfully Updated Informatino');
    }
    public function show_mail(Appointment $appoint){
        return view('admin.show_mail',[
            'appoint'=>$appoint
        ]);
    }
    public function send_mail(Request $request,Appointment $appoint){
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart,
        ];
        Notification::send($appoint,new SendMailNotication($details));
        return back()->with('success','Mail has been sent');
    }
}
