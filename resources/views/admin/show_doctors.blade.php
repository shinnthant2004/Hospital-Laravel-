<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">

     @include('admin.sidebar')

     @include('admin.nav')

     <div class="container-fluid">
         <div style="padding:100px" align="center">
            <div class="my-3 text-white"><h1>All Doctors</h1></div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-light my-4" style="width:1000px">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Room</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($doctors as $doctor)
                  <tr>
                    <th scope="row">{{ $doctor->name }}</th>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->speciality }}</td>
                    <td>{{ $doctor->room }}</td>
                    <td>
                      <img src="/storage/{{ $doctor->image }}">
                    </td>
                    <td><a href="/delete/{{ $doctor->id }}" class="btn btn-danger">Delete</a></td>
                    <td><a href="/update/{{ $doctor->id }}" class="btn btn-warning">Update</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
         </div?>
     </div>

    @include('admin.script')

  </body>
</html>
