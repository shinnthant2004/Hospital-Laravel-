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
                <h2 class="fw-bold text-center mb-4">Mail System</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                 <form action="/send_mail/{{ $appoint->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="greeting" class="mr-3">Greeting</label>
                    <input  required type="text" class="text-black" id="greeting" name="greeting">
                      @error('greeting')
                       <div class="text-danger my-2">{{ $message }}</div>
                      @enderror
                </div>
                <div class="mb-4">
                    <label for="body" class="mr-3">Body</label>
                    <input  required type="text" class="text-black" id="body" name="body" value="{{ old('body') }}">
                    @error('body')
                       <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="actiontext" class="mr-3">Action Text</label>
                    <input  required type="text" class="text-black" id="actiontext" name="actiontext" value="{{ old('actiontext') }}">
                    @error('actiontext')
                       <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="actionurl" class="mr-3">Action Url</label>
                    <input  required type="text" class="text-black" id="actionurl" name="actionurl" value="{{ old('actionurl') }}">
                    @error('actionurl')
                       <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="endpart" class="mr-3">End Part</label>
                    <input  required type="text" class="text-black" id="endpart" name="endpart" value="{{ old('endpart') }}">
                    @error('endpart')
                       <div class="text-danger my-2">{{ $message }}</div>
                    @enderror
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
