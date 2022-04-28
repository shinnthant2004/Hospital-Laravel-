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
         <div style="padding: 100px" align="center">
            <h1 class="my-3">Appointments</h1>
            <table class="table table-bordered table-hover table-light" style="width:1000px">
                <thead>
                  <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Cancel</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($appoints as $appoint)
                  <tr>
                    <th>{{ $appoint->name }}</th>
                    <td>{{ $appoint->email }}</td>
                    <td>{{ $appoint->phone }}</td>
                    <td>{{ $appoint->doctor }}</td>
                    <td>{{ $appoint->date }}</td>
                    <td>{{ $appoint->message }}</td>
                    <td>{{ $appoint->status }}</td>
                    <td>
                        <a href="approveAppoint/{{ $appoint->id }}" class="btn btn-success">Approve</a>
                    </td>
                    <td>
                        <a href="cancelAppoint/{{ $appoint->id }}" class="btn btn-warning">Cancel</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
     </div>

    @include('admin.script')

  </body>
</html>
