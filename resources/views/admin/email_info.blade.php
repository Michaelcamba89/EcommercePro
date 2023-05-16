<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        h1{
           
            text-align: center;
        }
        label{
            display:inline-block;
            width:300px;
            font-size:15px;
            font-weight: bold;
           
        }
      
        .btn{
            padding:20px;
            font-size: large;
            border-radius: 25px;
        }
       
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h1 style="font-size:25px;">Send Email to {{$order->email}}</h1>

            
            <form action="{{url('send_user_email', $order->id)}}" method="POST">
                @csrf
                <div class="form-row row">
                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <label for="">Email Greeting: </label>
                        <input type="text" name="greeting" id="" style="color:black;">
                    </div>

                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <label for="">Email First Line: </label>
                        <input type="text" name="firstline" id="" style="color:black;">
                    </div>

                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <label for="">Email Body: </label>
                        <input type="text" name="body" id="" style="color:black;">
                    </div>

                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <label for="">Email Button name: </label>
                        <input type="text" name="button" id="" style="color:black;">
                    </div>

                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <label for="">Email URL: </label>
                        <input type="text" name="url" id="" style="color:black;">
                    </div>

                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <label for="">Email Last Line: </label>
                        <input type="text" name="lastline" id="" style="color:black;">
                    </div>
                    <br>
                    <div class="col-md-12" style="padding-left:35%; padding-top:30px;">
                        <input type="submit" value="Send Email" class="btn btn-primary">
                    </div>
                </div>
                
            </form>
                
            
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>