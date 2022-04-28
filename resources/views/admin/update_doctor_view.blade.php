<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        label{
            width: 100px
        }
        input{
            width: 220px
        }
        select{
            width: 220px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">

     @include('admin.sidebar')

     @include('admin.nav')

     <div class="container-fluid page-body-wrapper">
         <div class="container" style="padding: 100px" align="center">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        <form action="/updating_doctor/{{ $doctor->id }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="mb-3">
            <label for="name">Doctor Name</label>
            <input type="text" id="name" name="name" class="ml-4 text-black" value="{{ $doctor->name }}">
           </div>

           <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="ml-4 text-black" value="{{ $doctor->phone }}">
           </div>

           <div class="mb-4">
            <label for="speciality"  class="mr-3">Speciality</label>
            <select  required name="speciality" value="{{ $doctor->speciality }}" class="text-black-50">
                <option value="skin">Skin</option>
                <option value="heart">Heart</option>
                <option value="eye">Eye</option>
                <option value="nose">Nose</option>
            </select>
           </div>

           <div class="mb-3">
            <label for="room">Room No</label>
            <input type="text" name="room" id="room" class="ml-4 text-black" value="{{ $doctor->room }}">
           </div>

           <div class="d-flex align-items-center justify-content-between my-4" style="width:322px">
               <h3>Recent Image</h3>
               <img src="/storage/{{ $doctor->image }}" width="156px" style="border-radius: 50%" height="70px">
           </div>

           <div class="mb-4">
            <label for="image" class="mr-3">Doctor Image</label>
            <input required  type="file" name="image"  placeholder="Image of doctor">
           </div>

           <button class="btn btn-success" type="submit">Submit</button>
        </form>
        </div>
     </div>

    @include('admin.script')

  </body>
</html>
