<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
      if(Auth::id()){
          if(Auth()->user()->usertype==0){
            return view('user.home',[
                'doctors'=>Doctor::all()
            ]);
          }else{
            return view('admin.home');
          }
      }else{
          return redirect()->back();
      }
    }
    public function index(){
      return view('user.home',[
          'doctors'=>Doctor::all()
      ]);
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
      public function my_appointments(){
          $appointments=Appointment::where('user_id',Auth()->user()->id)->get();
        return view('user.my_appointment',[
            'appoints'=>$appointments
        ]);
      }
      public function delete_appoint(Appointment $appoint){
       $appoint->delete();
       return redirect()->back();
      }
}
