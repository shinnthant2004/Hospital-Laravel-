<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        label{
            width: 130px
        }
        input{
            width: 230px
        }
        select{
            width: 230px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">

     @include('admin.sidebar')

     @include('admin.nav')

     <div class="container-fluid page-body-wrapper">
         <div class="container">
             <div align="center" style="padding: 80px">
                <h2 class="fw-bold text-center mb-4">Add New Doctor</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                 <form action="/add_doctor" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="mr-3">Doctor Name</label>
                    <input  required type="text" class="text-black" name="name" value="{{ old('name') }}" placeholder="Write doctor name">
                      @error('name')
                       <div class="text-danger my-2">{{ $message }}</div>
                      @enderror
                </div>
                <div class="mb-4">
                    <label for="phone" class="mr-3">Phone</label>
                    <input  required type="number" class="text-black" name="phone" value="{{ old('phone') }}" placeholder="Write doctor's phone">
                    @error('phone')
                       <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="speciality" class="mr-3">Speciality</label>
                    <select  required name="speciality" class="text-black-50">
                        <option>Select your speciality</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="room" class="mr-3">Room No</label>
                    <input required  type="number" class="text-black" name="room" value="{{ old('room') }}" placeholder="Room Number">
                    @error('room')
                       <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="mr-3">Doctor Image</label>
                    <input required  type="file" name="image" value="{{ old('image') }}" placeholder="Image of doctor">
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
                </form>
             </div>
         </div>
     </div>

    @include('admin.script')

  </body>
</html>
